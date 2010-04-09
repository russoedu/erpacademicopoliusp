<?php

class UserController extends Controller {
    const PAGE_SIZE=10;

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
                'accessControl', // perform access control for CRUD operations
        );
    }
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
                array('allow',  // allow all users to perform 'index' and 'view' actions
                        'actions'=>array('index','view','novoUsuario'),
                        'users'=>array('*'),
                ),
                array('deny',  // deny all users
                        'users'=>array('*'),
                ),
        );
    }

    /**
     * Displays a particular model.
     */
    public function actionView() {
        $model = $this->loadModel();
        $this->render('view',array(
                'model'=>$model,
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider=new CActiveDataProvider('User', array(
                        'pagination'=>array(
                                'pageSize'=>Yii::app()->controller->module->user_pase_size,
                        ),
        ));

        $this->render('index',array(
                'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Função que possibilita o admin criar outros usuários
     * dos seguintes tipos:
     * Admin, professor e bibliotecário.
     */
    public function actionNovoUsuario() {
        $model = new RegistrationForm;
        $profile=new Profile;
        $group = null;
        if(isset($_POST['RegistrationForm'])) {
            $model->attributes=$_POST['RegistrationForm'];
            $profile->attributes=$_POST['Profile'];
            $group = $_POST['group'];
            if($model->validate()&& $profile->validate()) {
                $soucePassword = $model->password;
                $model->password=UserModule::encrypting($model->password);
                $model->verifyPassword=UserModule::encrypting($model->verifyPassword);
                $model->activkey=UserModule::encrypting(microtime().$model->password);
                $model->createtime=time();
                $model->lastvisit=((Yii::app()->controller->module->autoLogin&&Yii::app()->controller->module->loginNotActiv)?time():0);
                $model->superuser=0;
                if ($group == 'a') {
                    $model->superuser=1;
                }
                $model->status=1;
                if($model->save()) {
                    $profile->user_id=$model->id;
                    $profile->save();
                    switch ($group) {
                        case 'p':
                            $professor = new professor;
                            $professor->nome = $_POST['Profile']['firstname'] . ' '.
                                    $_POST['Profile']['lastname'];
                            $professor->tbl_users_id = $model->id;
                            $professor->id_professor = $_POST['id'];
                            $professor->save();
                            break;
                        case 'b':
                            $bibliotecario = new bibliotecario;
                            $bibliotecario->nome = $_POST['Profile']['firstname'] . ' '.
                                    $_POST['Profile']['lastname'];
                            $bibliotecario->tbl_users_id = $model->id;
                            $bibliotecario->id_bibliotecario = $_POST['id'];
                            $bibliotecario->save();
                            break;
                        case 'g':
                            break;
                    }
                    $this->redirect(array('/user/admin'));
                }
            }
        }
        $this->render('novoUsuario', array(
                'model'=>$model, 'profile'=>$profile,
                'group'=>$group
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel() {
        if($this->_model===null) {
            if(isset($_GET['id']))
                $this->_model=User::model()->findbyPk($_GET['id']);
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }


    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
     */
    public function loadUser($id=null) {
        if($this->_model===null) {
            if($id!==null || isset($_GET['id']))
                $this->_model=User::model()->findbyPk($id!==null ? $id : $_GET['id']);
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }

}
