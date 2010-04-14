<?php

class DisciplinaController extends Controller {
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
                'actions'=>$this->actions_view(),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model=new disciplina;
        $id_curso = $_REQUEST['id_curso'];

        if(isset($_POST['disciplina'])) {
            $disciplina = $_POST['disciplina'];
            $disciplina['id_curso'] = $id_curso;
            $model->attributes=$disciplina;
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_disciplina));
        }

        $this->render('create',array(
                'model'=>$model,
                'cursos'=>curso::model()->findAll(),
                'professores'=>Yii::app()->getModule('user')->getProfessores(),
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {
        $model=$this->loadModel();
        if(isset($_POST['disciplina'])) {
            $model->attributes=$_POST['disciplina'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_disciplina));
        }

        $this->render('update',array(
                'model'=>$model,
                'cursos'=>curso::model()->findAll(),
                'professores'=>Yii::app()->getModule('user')->getProfessores()
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
        $dataProvider=new CActiveDataProvider('disciplina', array(
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
        $dataProvider=new CActiveDataProvider('disciplina', array(
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
                $this->_model=disciplina::model()->findbyPk($_GET['id']);
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }

    /**
     * retorna o grupo e seta a variavel do grupo....
     */
    public function loadGrupo() {
        $this->_grupo = Yii::App()->getModule('user')->getGrupo();
        return $this->_grupo;
    }

    public function actions_view() {
        $grupo = $this->loadGrupo();
        $model = $this->loadModel();
        $array_actions = array(
                'admin'=>array(
                        CHtml::link('Criar oferecimento',array('/cursos/oferecimento/create','id_disciplina'=>$model->id_disciplina)),
                ),
                'professor'=>array(),
                'bibliotecario'=>array(),
                'guest'=>array(),
                'aluno'=>array(),
                'gestoracademico'=>array(
                        CHtml::link('Atualizar Disciplina', array('update', 'id'=>$model->id_disciplina)),
                        CHtml::link('Criar oferecimento',array('/cursos/oferecimento/create','id_disciplina'=>$model->id_disciplina))
                ,),

        );
        return $array_actions[$grupo];
    }

    public function actions_index() {
        $grupo = $this->loadGrupo();
        $array_actions = array(
                'admin'=>array(),
                'professor'=>array(),
                'bibliotecario'=>array(),
                'guest'=>array(),
                'aluno'=>array(),
                'gestoracademico'=>array(),

        );
        return $array_actions[$grupo];

    }



}
