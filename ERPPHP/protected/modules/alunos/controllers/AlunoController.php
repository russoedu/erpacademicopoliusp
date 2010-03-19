<?php

class AlunoController extends Controller {
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
                        'actions'=>array('index','view'),
                        'users'=>array('*'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions'=>array('create','update'),
                        'users'=>array('@'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'actions'=>array('admin','delete'),
                        'users'=>array('admin'),
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
        $this->render('view',array(
                'model'=>$this->loadModel(),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model=new aluno;
        if(isset($_POST['aluno'])) {
            $dados_aluno = $_POST['aluno'];
            $dados_aluno['tbl_users_id'] = 1;
            print_r($dados_aluno);
            $model->attributes=$dados_aluno;
            if($model->validate()) {
                //dados do aluno são válidos....
                //crio primeiro o usuário para esse aluno com alguns dados temporários
                $user_data = Array(
                        //alguns dos dados são temporários...
                        'username'=>time()."",
                        'password'=>'xxxx',
                        'email'=> $dados_aluno['email'],
                        'createtime'=>time(),
                        'lastvisit'=>time(),
                        'superuser'=>0,
                        'status'=>1,
                );
                $user = new User;
                $user->attributes=$user_data;
                $user->save();
                $profile_aluno = new Profile;
                $nome_aluno = $dados_aluno['nome'];
                $nome_aluno = explode(' ', $nome_aluno);
                $profile_data = Array(
                        'firstname'=>$nome_aluno[0],
                        'lastname'=>end($nome_aluno),
                        
                );
                $profile_aluno->user_id = $user->id;
                $profile_aluno->attributes=$profile_data;
                $profile_aluno->save();
                $dados_aluno['tbl_users_id'] = $user->id;
                $model->attributes=$dados_aluno;
                if($model->save()) {
                    $user_mod = User::model()->findByPk($profile_aluno->user_id);
                    $user_data = Array(
                        'username'=>$model->id_aluno,
                        'password'=>UserModule::encrypting($model->id_aluno),
                        'activkey'=>UserModule::encrypting(microtime().$model->id_aluno),
                        'email'=> $dados_aluno['email'],
                        'createtime'=>time(),
                        'lastvisit'=>time(),
                        'superuser'=>0,
                        'status'=>1,
                    );
                    print_r($user_data);
                    $user_mod->attributes = $user_data;
                    $user_mod->save();
                    $this->redirect(array('view','id'=>$model->id_aluno));
                }
            }
        }
        $this->render('create',array(
                'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {
        $model=$this->loadModel();
        if(isset($_POST['aluno'])) {
            $model->attributes=$_POST['aluno'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_aluno));
        }

        $this->render('update',array(
                'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete() {
        if(Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel()->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_POST['ajax']))
                $this->redirect(array('index'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider=new CActiveDataProvider('aluno', array(
                        'pagination'=>array(
                                'pageSize'=>self::PAGE_SIZE,
                        ),
        ));

        $this->render('index',array(
                'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $dataProvider=new CActiveDataProvider('aluno', array(
                        'pagination'=>array(
                                'pageSize'=>self::PAGE_SIZE,
                        ),
        ));

        $this->render('admin',array(
                'dataProvider'=>$dataProvider,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel() {
        if($this->_model===null) {
            if(isset($_GET['id']))
                $this->_model=aluno::model()->findbyPk($_GET['id']);
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }
}