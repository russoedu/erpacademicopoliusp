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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','CreateMatricula','UpdateMatricula','indexMatriculaAluno','delete', 'DeleteMatricula'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','CreateMatricula','UpdateMatricula','indexMatriculaAluno','delete', 'DeleteMatricula'),
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
                CHtml::linkButton('Deletar curso',array('submit'=>array('delete','id'=>$model->id_curso),'confirm'=>'Tem certeza?')),
                CHtml::link('Criar disciplina' , array('/cursos/disciplina/create', 'id_curso'=>$model->id_curso)),
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
                CHtml::linkButton('Deletar curso',array('submit'=>array('delete','id'=>$model->id_curso),'confirm'=>'Tem certeza?')),
                CHtml::link('Criar disciplina' , array('/cursos/disciplina/create', 'id_curso'=>$model->id_curso)),
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

        public function actionCreateMatricula()
        {
            $model=new curso_aluno;

            if(isset($_REQUEST['id_aluno']))
                $model->id_aluno = $_REQUEST['id_aluno'];

            if(isset($_POST['curso_aluno'])){
                $model->attributes=$_POST['curso_aluno'];
                if($model->ano_fim == '')
                    $model->ano_fim = null;
                if($model->semestre_fim == '')
                    $model->semestre_fim = null;
                if($model->save())
                    $this->redirect(array('/alunos/aluno/view','id'=>$model->id_aluno));
            }

            
            $cursos=curso::model()->findAllBySql('SELECT * FROM curso ORDER BY nome');
            $aluno=aluno::model()->findByPk($model->id_aluno);
    
            $this->render('createMatricula',array(
			'model'=>$model,'cursos'=>$cursos,'aluno'=>$aluno,
		));
        }

        public function actionUpdateMatricula()
        {
            $model=new curso_aluno;

            if(isset($_REQUEST['id_curso']) && isset($_REQUEST['id_aluno']))
                $model=curso_aluno::model()->find('id_aluno=:id_aluno and id_curso=:id_curso',
                        array(':id_curso'=>$_REQUEST['id_curso'], ':id_aluno'=>$_REQUEST['id_aluno']));

            if(isset($_POST['curso_aluno'])){
                $model->attributes=$_POST['curso_aluno'];
                 if($model->ano_fim == '')
                    $model->ano_fim = null;
                if($model->semestre_fim == '')
                    $model->semestre_fim = null;
                if($model->save())
                    $this->redirect(array('/alunos/aluno/view','id'=>$model->id_aluno));
            }

            $cursos=curso::model()->findAllBySql('SELECT * FROM curso ORDER BY nome');
            $aluno=aluno::model()->findByPk($_REQUEST['id_aluno']);

            $this->render('updateMatricula',array(
			'model'=>$model,'cursos'=>$cursos,'aluno'=>$aluno,
		));
        }

        public function actionIndexMatriculaAluno()
        {
            if(isset($_REQUEST['id_aluno'])){
                $aluno=aluno::model()->findByPk($_REQUEST['id_aluno']);

                $cursos=curso::model()->findAll();

                $dataProvider=new CActiveDataProvider('curso_aluno', array(
                        'criteria'=>array(
                            'condition'=>'id_aluno = :id_aluno',
                            'params'=>array(':id_aluno'=>$_GET['id_aluno'],),
                        ),
                        'pagination'=>array(
                                'pageSize'=>self::PAGE_SIZE,
                        ),

                    )
                );

                 $this->render('indexMatriculaAluno',array(
			'dataProvider'=>$dataProvider, 'aluno'=>$aluno, 'cursos'=>$cursos,
                        'actions'=>$this->actions_indexMatricula($aluno->id_aluno),
		));
            }
        }


        public function actionDeleteMatricula()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			//$this->loadModel()->delete();
                        $curso_aluno=curso_aluno::model()->findByPk(array('id_aluno'=>$_REQUEST['id_aluno'], 'id_curso'=>$_REQUEST['id_curso']));

                        $curso_aluno->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('indexMatriculaAluno','id'=>$_REQUEST['id_aluno']));
                        
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

        public function actions_indexMatricula($id_aluno) {
        $grupo = $this->loadGrupo();
        $array_actions = array(
                'admin' => array(
                        CHtml::link('Nova Matrícula',array('createMatricula', 'id_aluno'=>$id_aluno )),
                ),
                'aluno' => array(

                ),
                'professor' => array(
                ),
                'bibliotecario' =>array(
                ),
                'gestoracademico' =>array(
                        CHtml::link('Nova Matrícula',array('createMatricula', 'id_aluno'=>$id_aluno )),
                ),
                'guest' => array(
                )
        );
        return $array_actions[$grupo];
    }

}
