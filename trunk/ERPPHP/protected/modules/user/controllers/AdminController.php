<?php

class AdminController extends Controller
{
	public $defaultAction = 'admin';
	
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','view'),
				'users'=>UserModule::getAdmins(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('User', array(
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_pase_size,
			),
		));

		/*
 		 * Acesso a webservice de RH
		 */
                $this->syncWithHumanResources();

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/*
	 * Acesso ao webservice de RH
	 */
	private function getEmployersJSONList($roleName) {
                $ws_url = "http://rhlabsoft.heroku.com/employees.json?by_role=" . urlencode($roleName);
		//$ws_url = "http://localhost/fake-php-ws/index.php?by_role=" . (urlencode($roleName));
		$ws_json_string = file_get_contents($ws_url);

                $result = json_decode($ws_json_string);
                if (is_null($result)) {
                    $result = array();
                }

		return $result;
	}

        private function syncWithHumanResources() {
                // bibliotecários
                $all_bibliotecarios = bibliotecario::model()->findAll();
		$bibliotecarios_hash_list = $this->getEmployersJSONList('Bibliotecário');
                assert(is_array($all_bibliotecarios));
                $this->syncDb($all_bibliotecarios, $bibliotecarios_hash_list, 'b');

                // Professores                
                $all_professores = professor::model()->findAll();
                $professores_hash_list = $this->getEmployersJSONList('Professor');
                assert(is_array($all_professores));
                $this->syncDb($all_professores, $professores_hash_list, 'p');

                // Gestores Acadêmicos
                $all_gestores = gestoracademico::model()->findAll();
                $gestores_hash_list = $this->getEmployersJSONList('Gestor Acadêmico');
                assert(is_array($gestores_hash_list));
                $this->syncDb($all_gestores, $gestores_hash_list, 'g');
        }

	private function syncDb($registers, $employeers_hash, $employeersType) {

                // para cada bibliotecario existente, verifica se ele ainda
                // existe no RH, se não existir no RH remove do banco
                // @POG: Sincronia muito suceptível a falhas
                while ( count($registers) > 0 ) {
                    $current_register = array_shift($registers);
                    $found = false;
                    for ($i=0;$i<count($employeers_hash); $i++) {
                        $id = null;
                        switch ($employeersType) {
                            case 'b':
                                $id = $current_register->id_bibliotecario;
                                break;
                            case 'p':
                                $id = $current_register->id_professor;
                                break;
                            case 'g':
                                $id = $current_register->id_gestor_academico;
                                break;
                        }
                        assert($id != null);


                        // verifica se o funcionário ainda existe no rh. Se existir: atualiza seus atributos
                        if (isset($employeers_hash[$i]) && $id == $employeers_hash[$i]->employee->id) {
                            $current_register->nome = $employeers_hash[$i]->employee->name;
                            // @TODO: atualizar o resto dos atributos do funcionário
                            $current_register->save();
                            unset($employeers_hash[$i]); // esse lista só deve conter novos funcionários
                            $found = true;
                            break;
                        }
                    }
                    // não está mais presente no módulo de RH, logo não deve
                    // estar presente no módulo acadêmico
                    if (!$found) {
                        $rf = RegistrationForm::model()->find("id=" . $current_register->tbl_users_id);
                        $profile = Profile::model()->findByPk($rf->id);

                        $current_register->delete();
                        $profile->delete();
                        $rf->delete();
                    }
                }
                 //$employeers_hash só tem os novos funcionários que devem
                 //ser inseridos no banco
                foreach($employeers_hash as $new_employeer) {
                    $this->addNewEmployeer($new_employeer->employee->name,
                            $new_employeer->employee->id, $employeersType);
                }

	}

        /**
         * Gera nome de usuario, primeiro nome e último nome a partir de um nome
         *
         * @param <type> $name
         * @return <type>
         */
        private function generateNewUserInfo($name) {
            $splitted_name = split(" ", $name);

            $username = strtolower($splitted_name[0] . $splitted_name[count($splitted_name) - 1]);
            $username = ereg_replace("[áàâãª]","a",$username);
            $username = ereg_replace("[éèê]","e",$username);
            $username = ereg_replace("[óòôõº]","o",$username);
            $username = ereg_replace("[úùû]","u",$username);
            $username = str_replace("ç","c",$username);

            
            
            return array(
                // POG: devia ser checado se já há alguém
                'username' => $username,
                'firstname' => $splitted_name[0],
                'lastname' => $splitted_name[1],
            );
        }

        /**
         * Adiciona um novo funcionário
         * 
         * @param <type> $name
         * @param <type> $id
         * @param <type> $employeerType
         */
        private function addNewEmployeer($name, $id, $employeerType) {
                $registrationForm = new RegistrationForm;
                $profile = new Profile;

                // gera informações para um novo usuário
                $userInfo = $this->generateNewUserInfo($name);
                $password = $userInfo['username'];
                $registrationForm->password=UserModule::encrypting($password);
                $registrationForm->verifyPassword=UserModule::encrypting($password);
                $registrationForm->activkey=UserModule::encrypting(microtime().$password);
                $registrationForm->createtime=time();
                $registrationForm->lastvisit=((Yii::app()->controller->module->autoLogin&&Yii::app()->controller->module->loginNotActiv)?time():0);
                $registrationForm->superuser=0;
                $registrationForm->status=1;
                $registrationForm->email = $userInfo['username'] . "@poli.usp.br"; // @POG: Isso é um pog, não temos info do e-mail
                $registrationForm->username = $userInfo['username'];

                if($registrationForm->validate()) {
                    $registrationForm->save();
                    $profile->firstname = $userInfo['firstname'];
                    $profile->lastname = $userInfo['lastname'];
                    $profile->user_id=$registrationForm->id;
                    $profile->save();

                    switch ($employeerType) {
                        case 'b':
                            $novoBibliotecario = new bibliotecario;
                            $novoBibliotecario->nome = $name;
                            $novoBibliotecario->id_bibliotecario = $id;
                            $novoBibliotecario->tbl_users_id = $registrationForm->id;
                            $novoBibliotecario->save();
                            break;
                        case 'p':
                            $novoProfessor = new professor;
                            $novoProfessor->nome = $name;
                            $novoProfessor->id_professor = $id;
                            $novoProfessor->tbl_users_id = $registrationForm->id;
                            $novoProfessor->save();
                            break;
                        case 'g':
                            $novoGestor = new gestoracademico;
                            $novoGestor->nome = $name;
                            $novoGestor->id_gestor_academico = $id;
                            $novoGestor->tbl_users_id = $registrationForm->id;
                            $novoGestor->save();
                            break;
                    }
                }
        }
        
	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$model = $this->loadModel();
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;
		$profile=new Profile;
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
			$model->createtime=time();
			$model->lastvisit=time();
			$profile->attributes=$_POST['Profile'];
			$profile->user_id=0;
			if($model->validate()&&$profile->validate()) {
				$model->password=Yii::app()->controller->module->encrypting($model->password);
				if($model->save()) {
					$profile->user_id=$model->id;
					$profile->save();
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		$profile=$model->profile;
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];
			
			if($model->validate()&&$profile->validate()) {
				$old_password = User::model()->findByPk($model->id);
				if ($old_password->password!=$model->password) {
					$model->password=Yii::app()->controller->module->encrypting($model->password);
					$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
				}
				$model->save();
				$profile->save();
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model = $this->loadModel();
			$profile = Profile::model()->findByPk($model->id);
			$profile->delete();
			$model->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('/user/admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=User::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	
}
