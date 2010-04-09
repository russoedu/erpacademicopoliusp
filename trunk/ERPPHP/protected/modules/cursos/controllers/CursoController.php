<?php

class CursoController extends Controller {
    const PAGE_SIZE=10;

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;
    private $_grupo;

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
                'actions'=>$this->actions_view()
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model=new curso;
        if(isset($_POST['curso'])) {
            $model->attributes=$_POST['curso'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_curso));
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
        if(isset($_POST['curso'])) {
            $model->attributes=$_POST['curso'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_curso));
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
        $dataProvider=new CActiveDataProvider('curso', array(
                        'pagination'=>array(
                                'pageSize'=>self::PAGE_SIZE,
                        ),
        ));

        $this->render('index',array(
                'dataProvider'=>$dataProvider,
            'actions'=>$this->actions_index()
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $dataProvider=new CActiveDataProvider('curso', array(
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
                $this->_model=curso::model()->findbyPk($_GET['id']);
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }

    public function actions_view(){
        $grupo = $this->loadGrupo();
        $model = $this->loadModel();
        $array_actions = array(
            'admin' => array(
                CHtml::link('Lista de cursos',array('index')),
                CHtml::link('Criar curso',array('create')),
                CHtml::link('Atualizar curso',array('update','id'=>$model->id_curso)),
                CHtml::linkButton('Deletar curso',array('submit'=>array('delete','id'=>$model->id_curso),'confirm'=>'Tem certeza?'))
            ),
            'aluno' =>array(
                CHtml::link('Lista de cursos',array('index')),
            ),
            'professor'=>array(
                CHtml::link('Lista de cursos',array('index')),
            ),
            'bibliotecario'=>array(

            ),
            'gestoracademico'=>array(
                CHtml::link('Lista de cursos',array('index')),
                CHtml::link('Criar curso',array('create')),
                CHtml::link('Atualizar curso',array('update','id'=>$model->id_curso)),
                CHtml::linkButton('Deletar curso',array('submit'=>array('delete','id'=>$model->id_curso),'confirm'=>'Tem certeza?'))
            ),
            'guest'=>array(
                CHtml::link('Lista de cursos',array('index')),
            ),

        );
        return $array_actions[$grupo];
    }

    public function actions_index() {
        $grupo = $this->loadGrupo();
        $array_actions = array(
                'admin' => array(
                        CHtml::link('Criar Curso',array('create')),
                ),
                'aluno' => array(

                ),
                'professor' => array(
                ),
                'bibliotecario' =>array(
                ),
                'gestoracademico' =>array(
                        CHtml::link('Criar Curso',array('create')),
                ),
                'guest' => array(
                )
        );
        return $array_actions[$grupo];
    }

    /**
     * retorna o grupo e seta a variavel do grupo....
     */
    public function loadGrupo() {
        $this->_grupo = Yii::App()->getModule('user')->getGrupo();
        return $this->_grupo;
    }
}
