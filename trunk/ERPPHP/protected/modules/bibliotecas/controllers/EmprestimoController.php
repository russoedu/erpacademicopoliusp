<?php

class EmprestimoController extends Controller
{
	const PAGE_SIZE=10;

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','reportreturn'),
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
	public function actionView()
	{
            $model = $this->loadModel();

            $aluno = aluno::model()->findByPk($model->id_aluno);
            $livro = livro::model()->findByPk($model->id_livro);
            $biblioteca = biblioteca::model()->findByPk($livro->id_biblioteca);

            $this->render('view',array(
                    'model'=>$model, 'aluno'=>$aluno,'livro'=>$livro,'biblioteca'=>$biblioteca,
            ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            $id_livro = $_REQUEST['id_livro'];

            $model=new emprestimo;

            if(isset($_POST['emprestimo']))
            {
                $emprestimo = $_POST['emprestimo'];
                $emprestimo['id_livro'] = $id_livro;
                $emprestimo['data_retirada'] = date('Y-m-d',strtotime(str_replace('/', '-', $emprestimo['data_retirada'])));
                $emprestimo['data_devolucao'] = date('Y-m-d',strtotime(str_replace('/', '-', $emprestimo['data_devolucao'])));
                
                $model->attributes=$emprestimo;
                
                if($model->save())
			$this->redirect(array('view','id'=>$model->id_emprestimo));
            }

            $aluno = aluno::model()->findByPk($model->id_aluno);
            $livro = livro::model()->findByPk($id_livro);
            
            $biblioteca = biblioteca::model()->findByPk($livro->id_biblioteca);

            $this->render('create',array(
                'model'=>$model, 'aluno'=>$aluno,'livro'=>$livro,'biblioteca'=>$biblioteca,
            ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
                $id_livro = $_REQUEST['id_livro'];

                $model = emprestimo::model()->find('id_livro = :idLivro AND data_devolucao_efetiva is null', Array (':idLivro'=>$id_livro));

		if(isset($_POST['emprestimo']))
		{
                        $emprestimo = $_POST['emprestimo'];
                        $emprestimo['data_retirada'] = date('Y-m-d',strtotime(str_replace('/', '-', $emprestimo['data_retirada'])));
                        $emprestimo['data_devolucao'] = date('Y-m-d',strtotime(str_replace('/', '-', $emprestimo['data_devolucao'])));

                        $model->attributes=$emprestimo;
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_emprestimo));
		}

                $aluno = aluno::model()->findByPk($model->id_aluno);
                $livro = livro::model()->findByPk($model->id_livro);
                $biblioteca = biblioteca::model()->findByPk($livro->id_biblioteca);

                if(isset($model->data_devolucao_efetiva))
                    $status = "Finalizado";
                elseif(!isset($model->data_devolucao_efetiva) && strtotime($model->data_devolucao) < strtotime(date('Y-m-d')))
                    $status = "Em Atraso";
                else
                    $status = "Ativo";

		$this->render('update',array(
			'model'=>$model, 'aluno'=>$aluno,'livro'=>$livro,'biblioteca'=>$biblioteca,'status'=>$status,
		));
	}

        /**
	 * Report the return a particular book.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionReportReturn()
	{
		if(isset($_POST['emprestimo']))
		{
                        $id_livro = $_REQUEST['id_livro'];
                        
                        $model = emprestimo::model()->find('id_livro = :idLivro AND data_devolucao_efetiva is null', Array (':idLivro'=>$id_livro));
                        
                        $emprestimo = $_POST['emprestimo'];

                        $emprestimo['id_livro'] = $id_livro;
                        $emprestimo['data_retirada'] = date('Y-m-d',strtotime(str_replace('/', '-', $emprestimo['data_retirada'])));
                        $emprestimo['data_devolucao'] = date('Y-m-d',strtotime(str_replace('/', '-', $emprestimo['data_devolucao'])));

                        $model->attributes=$emprestimo;
                        $model->data_devolucao_efetiva = date('Y-m-d');
                        
                        if($model->save()){
				$this->redirect(array('view', 'id'=>$model->id_livro,));
                        }
		}
                
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
	public function actionIndex()
	{
                $dataProvider = null;
                $aluno = null;
                if (isset ($_GET['id_aluno'])){
                    $aluno = aluno::model()->findByPk($_GET['id_aluno']);

                    $dataProvider=new CActiveDataProvider('emprestimo', array(
                            'criteria'=>array(
                                'condition'=>'id_aluno=' . $_GET['id_aluno']),
                            'pagination'=>array(
                                    'pageSize'=>self::PAGE_SIZE,
                            ),
                        ));
                }

		$this->render('index',array(
			'dataProvider'=>$dataProvider,'aluno'=>$aluno,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
        {
		$dataProvider=new CActiveDataProvider('emprestimo', array(
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
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=emprestimo::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}
