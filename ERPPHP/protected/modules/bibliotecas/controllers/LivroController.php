<?php

class LivroController extends Controller {
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
                        'actions'=>array('view'),
                        'users'=>array('*'),
                ),
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions'=>array('create','update','delete'),
                        'users'=>array('@'),
                ),
                array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'actions'=>array(),
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

        $dataProvider=new CActiveDataProvider('emprestimo', array(
                        'criteria'=>array(
                                'condition'=>'id_livro = ' . $_GET['id'] . ' AND data_devolucao_efetiva is null'
                        ),
                )
        );

        $model = $this->loadModel();
        $biblioteca = biblioteca::model()->findByPk($model->id_biblioteca);

        if($dataProvider->getItemCount() >= 1)
            $status="Emprestado";
        else
            $status="Disponível";

        $actions = $this->actions_view($status);
        $this->render('view',array(
                'model'=>$model,
                'actions'=>$actions,
                'biblioteca'=>$biblioteca,
                'status'=>$status

                )
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $id_bilioteca = $_REQUEST['bib'];
        $model=new livro;
        $biblioteca = biblioteca::model()->findByPk($id_bilioteca);
        $livro = Array();

        if(isset($_POST['livro'])) {
            $livro = $_POST['livro'];
            $livro['id_biblioteca'] = $id_bilioteca;
            $model->attributes=$livro;
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_livro));
        }
        echo $model->id_biblioteca;
        $this->render('create',array(
                'model'=>$model,
                'biblioteca'=> $biblioteca,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {
        $model=$this->loadModel();
        $biblioteca = biblioteca::model()->findByPk($model->id_biblioteca);

        if(isset($_POST['livro'])) {
            $model->attributes=$_POST['livro'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_livro));
        }

        $this->render('update',array(
                'model'=>$model,
                'biblioteca'=> $biblioteca,
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
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel() {
        if($this->_model===null) {
            if(isset($_GET['id']))
                $this->_model=livro::model()->findbyPk($_GET['id']);
            if($this->_model===null)
                throw new CHttpException(404,'The requested page does not exist.');
        }
        return $this->_model;
    }

    public function actions_view($status) {
        $grupo = $this->loadGrupo();
        $model = $this->loadModel();
        $array_actions = array(
                'admin'=>array(
                        CHtml::link('Atualizar Livro',array('update','id'=>$model->id_livro)),
                        CHtml::linkButton('Remover Livro',array('submit'=>array('delete','id'=>$model->id_livro),'confirm'=>'Deseja realmente remover este livro?'))
                ),
                'professor'=>array(),
                'bibliotecario'=>array(
                        CHtml::link('Atualizar Livro',array('update','id'=>$model->id_livro)),
                        CHtml::linkButton('Remover Livro',array('submit'=>array('delete','id'=>$model->id_livro),'confirm'=>'Deseja realmente remover este livro?'))
                ),
                'aluno'=>array(),
                'guest'=>array(),

        );
        
        if ($status == "Emprestado") {
            $adicional = CHtml::link('Atualizar Empréstimo',array('/bibliotecas/emprestimo/update','id_livro'=>$model->id_livro));
        }
        else {
            $adicional = CHtml::link('Emprestar Livro',array('/bibliotecas/emprestimo/create','id_livro'=>$model->id_livro));
        }

        array_push($array_actions['bibliotecario'],$adicional );
        array_push($array_actions['admin'],$adicional );

        return $array_actions[$grupo];
    }

     /**
     * Retorna o grupo e seta a variavel do grupo.
     */
    public function loadGrupo() {
        $this->_grupo = Yii::App()->getModule('user')->getGrupo();
        return $this->_grupo;
    }
}
