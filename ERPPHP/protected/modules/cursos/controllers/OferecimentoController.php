<?php



class OferecimentoController extends Controller {
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
        $model=new oferecimento;
        $id_disciplina = $_REQUEST['id_disciplina'];
        $professores_temp = Yii::App()->getModule('user')->getProfessores();
        $professores = array();
        foreach ($professores_temp as $professor) {
            $professores[$professor->id_professor]=$professor->nome;
        }
        if(isset($_POST['oferecimento'])) {
            $oferecimento = $_POST['oferecimento'];
            $oferecimento['id_disciplina'] = $id_disciplina;
            $oferecimento['data_inicio'] = date('Y-m-d',strtotime(str_replace('/', '-', $oferecimento['data_inicio'])));
            $oferecimento['data_fim'] = date('Y-m-d',strtotime(str_replace('/', '-', $oferecimento['data_fim'])));
            $model->attributes=$oferecimento;
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_oferecimento));
        }

        $this->render('create',array(
                'model'=>$model,
                'professores'=>$professores,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {
        $model=$this->loadModel();
         $professores_temp = Yii::App()->getModule('user')->getProfessores();
        $professores = array();
        foreach ($professores_temp as $professor) {
            $professores[$professor->id_professor]=$professor->nome;
        }
        if(isset($_POST['oferecimento'])) {
            $oferecimento = $_POST['oferecimento'];
            $oferecimento['data_inicio'] = date('Y-m-d',strtotime(str_replace('/', '-', $oferecimento['data_inicio'])));
            $oferecimento['data_fim'] = date('Y-m-d',strtotime(str_replace('/', '-', $oferecimento['data_fim'])));
            $model->attributes=$oferecimento;
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_oferecimento));
        }

        $this->render('update',array(
                'model'=>$model,
            'professores'=>$professores
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
        $dataProvider=new CActiveDataProvider('oferecimento', array(
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
        $dataProvider=new CActiveDataProvider('oferecimento', array(
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
                $this->_model=oferecimento::model()->findbyPk($_GET['id']);
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


    public function actions_index(){
        
    }

    public function actions_view(){
        $grupo = $this->loadGrupo();
        $model = $this->loadModel();
        $array_actions = array(
            'admin'=>array(
                CHtml::link('Listar oferecimentos',array('index')),
                CHtml::link('Atualizar oferecimento',array('update','id'=>$model->id_oferecimento)),
                CHtml::linkButton('Deletar oferecimento',array('submit'=>array('delete','id'=>$model->id_oferecimento),'confirm'=>'Você tem certeza que deseja deletar?')),
            ),
            'guest'=>array(),
            'professor'=>array(),
            'gestoracademico'=>array(
                CHtml::link('Listar oferecimentos',array('index')),
                CHtml::link('Atualizar oferecimento',array('update','id'=>$model->id_oferecimento)),
                CHtml::linkButton('Deletar oferecimento',array('submit'=>array('delete','id'=>$model->id_oferecimento),'confirm'=>'Você tem certeza que deseja deletar?')),
            ),
            'aluno'=>array(
                CHtml::link('Listar oferecimentos',array('index')),
            ),
            'bibliotecario'=>array(),
        );
        return $array_actions[$grupo];
    }

}
