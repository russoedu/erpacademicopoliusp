<?php

class BibliotecaController extends Controller {
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
                array('allow',

                        'users'=>array('@'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'actions'=>array('admin','delete','create','update'),
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

         if (isset ($_POST['txtSearch']))
                   $search = '%' . $_POST['txtSearch'] . '%';
            else
                   $search = "%%";

        $dataProvider=new CActiveDataProvider('Livro', array(
                        'criteria'=>array(
                            'condition'=>'id_biblioteca = :id_biblioteca AND (isbn like :search OR titulo like :search OR autor like :search OR editora like :search)',
                            'params'=>array(':id_biblioteca'=>$_GET['id'], ':search'=>$search,),
                        ),
                        'pagination'=>array(
                                'pageSize'=>self::PAGE_SIZE,
                        ),
                )
        );

        $actions = $this->actions_view();
        $this->render('view',array(
                'model'=>$this->loadModel(),
                'dataProvider'=>$dataProvider,
                'actions'=>$actions,
                'search'=>$search,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model=new biblioteca;
        if(isset($_POST['biblioteca'])) {
            $model->attributes=$_POST['biblioteca'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_biblioteca));
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
        if(isset($_POST['biblioteca'])) {
            $model->attributes=$_POST['biblioteca'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_biblioteca));
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
        $dataProvider=new CActiveDataProvider('biblioteca', array(
                        'pagination'=>array(
                                'pageSize'=>self::PAGE_SIZE,
                        ),
        ));
        $actions = $this->actions_index();

        $this->render('index',array(
                'dataProvider'=>$dataProvider,
                'actions'=>$actions,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $dataProvider=new CActiveDataProvider('biblioteca', array(
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
                $this->_model=biblioteca::model()->findbyPk($_GET['id']);
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

    /**
     * retorna o id do aluno na tabela específica
     */
    public function getIdAluno(){
        $tbl_user_id = Yii::App()->user->id;
        $aluno = aluno::model()->find('tbl_users_id=' . $tbl_user_id);
        return $aluno->id_aluno;
    }

    /**
     * retorna as ações para a página actionview, conforme o grupo...
     */
    public function actions_view() {
        $grupo = $this->loadGrupo();
        $model = $this->loadModel();
        $array_actions = array(
                'admin' => array(
                        CHtml::link('Listagem de bibliotecas',array('index')),
                        CHtml::link('Adicionar livro', array('/bibliotecas/livro/create','bib'=>$model->id_biblioteca)),
                        CHtml::link('Atualizar biblioteca',array('update','id'=>$model->id_biblioteca)),
                        CHtml::linkButton('Deletar biblioteca',array('submit'=>array('delete','id'=>$model->id_biblioteca),'confirm'=>'Tem certeza?'))
                ),
                'aluno' => array(
                        CHtml::link('Meus Empréstimos',array('/bibliotecas/emprestimo/index','id_aluno'=>$this->getIdAluno()))
                ),
                'professor' => array(
                        CHtml::link('Listagem de bibliotecas',array('index')),
                ),
                'bibliotecario' =>array(
                        CHtml::link('Listagem de bibliotecas',array('index')),
                        CHtml::link('Adicionar livro', array('/bibliotecas/livro/create','bib'=>$model->id_biblioteca)),
                        CHtml::link('Atualizar biblioteca',array('update','id'=>$model->id_biblioteca)),
                ),
                'guest' => array(
                        CHtml::link('Listagem de bibliotecas',array('index')),
                )


        );
        return $array_actions[$grupo];

    }

    public function actions_index(){
        $grupo = $this->loadGrupo();
        $array_actions = array(
                'admin' => array(
                        CHtml::link('Criar biblioteca',array('create')),
                ),
                'aluno' => array(
                ),
                'professor' => array(
                ),
                'bibliotecario' =>array(
                ),
                'guest' => array(
                )


        );
        return $array_actions[$grupo];
    }

}
