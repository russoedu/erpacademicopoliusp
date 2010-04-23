<?php



class OferecimentoController extends Controller {
    const PAGE_SIZE=10;

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;
    private $_grupo;
    private $_horario;

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
                        'actions'=>array('create','update','oferecimentoDisponivel'),
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

        $model = $this->loadModel();
        $disciplina = disciplina::model()->findByPk($model->id_disciplina);
        $professor = professor::model()->findByPk($disciplina->id_professor_responsavel);
        $horario = horario::model()->find('id_oferecimento = ' . $model->id_oferecimento);

        $salas = $this->simula_sala();
        $data = $model->attributes;

        $data['disciplina'] = $disciplina->nome;
        $data['professor'] = $professor->nome;
        $data['id_disciplina'] = $disciplina->id_disciplina;
        $data['dia'] = $horario->dia;
        $data['sala'] = $salas[$model->id_sala];
        $this->render('view',array(
                'data'=>$data,
                'actions'=>$this->actions_view(),
                'model'=>$model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model =new oferecimento;
        $horario =new horario;
        $id_disciplina = $_REQUEST['id_disciplina'];
        $professores_temp = Yii::App()->getModule('user')->getProfessores();
        $professores = array();

//        $client = new SoapClient('http://143.107.102.57:51849/Service1.asmx');
        
        //Deveria pegar aqui o que o outro grupo deveria ter feito...
        $salas = $this->simula_Sala();



        foreach ($professores_temp as $professor) {
            $professores[$professor->id_professor]=$professor->nome;
        }
        $diaSemana = null;
        if(isset($_POST['oferecimento'])) {

            $oferecimento = $_POST['oferecimento'];
            $oferecimento['id_disciplina'] = $id_disciplina;
            $oferecimento['data_inicio'] = date('Y-m-d',strtotime(str_replace('/', '-', $oferecimento['data_inicio'])));
            $oferecimento['data_fim'] = date('Y-m-d',strtotime(str_replace('/', '-', $oferecimento['data_fim'])));
            $diaSemana = $_POST['dia_semana'];

            $model->attributes = $oferecimento;
            if($model->save()) {
                $horario_data = array(
                        'dia'=>$diaSemana,
                        'id_oferecimento' =>$model->id_oferecimento,
                        'horario_inicio' => '5:00:00',
                        'horario_fim' =>'5:00:00',
                );
                $horario->attributes = $horario_data;

                $horario->save();
                $this->gera_datas($model->data_inicio, $model->data_fim, $horario->dia);
//                $this->redirect(array('view','id'=>$model->id_oferecimento));
            }
        }

        $this->render('create',array(
                'model'=>$model,
                'professores'=>$professores,
                'diaSemana'=>$diaSemana,
                'salas'=>$salas,
        ));


    }


    public function simula_Sala(){
        return array(
            '1'=>'Sala1',
            '2'=>'Sala2',
            '3'=>'Sala3',
            '4'=>'Sala4',
            '5'=>'Sala5',
            '6'=>'Sala6',
        );
    }

    public function verifica_disponibilidade($id_sala, $dia){
        
    }

    public function gera_datas($inicio , $fim , $dia_semana){
        $equivalencia = array(
            'SEGUNDA'=>1,
            'TERÇA'=>2,
            'QUARTA'=>3,
            'QUINTA'=>4,
            'SEXTA'=>5,
        );

        $n_dia_semana = $equivalencia[$dia_semana];
        $n_dia_semana_atual =date('w',strtotime($inicio));
//        while($n_dia_semana != $n_dia_semana_atual)
        
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {
        $model=$this->loadModel();
        $horario = horario::model()->find('id_oferecimento = ' . $model->id_oferecimento);
        $salas = $this->simula_Sala();
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
                'professores'=>$professores,
                'diaSemana'=>$horario->dia,
                'salas'=>$salas,
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
            if(isset($_GET['id'])){
                $this->_model=oferecimento::model()->findbyPk($_GET['id']);
                $this->_horario = horario::model()->find('id_oferecimento='.$_GET['id']);
            }
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


    public function actions_index() {

    }

    public function actions_view() {
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

    public function actionOferecimentoDisponivel(){
        if(isset($_REQUEST['id_aluno'])){
            $aluno=aluno::model()->findByPk($_REQUEST['id_aluno']);
            $curso_aluno_array=curso_aluno::model()->findAllBySql("SELECT * FROM curso_aluno WHERE id_aluno = :id_aluno", array(':id_aluno'=>$aluno->id_aluno));
            $oferecimentos=array();
            foreach($curso_aluno_array as $curso_aluno){
                if($curso_aluno != "FORMADO"){
                    $semestre_atual=(int)date("m") > 6 ? 2 : 1;
                    $ano_cursando=(int)date('Y') - (int)$curso_aluno->ano_inicio + 1;
                    $semestre_cursando = 0;

                    if($ano_cursando != 0){
                        $semestre_cursando=$curso_aluno->semestre_inicio == 'PRIMEIRO' ?
                                $ano_cursando*2 - $semestre_atual : $ano_cursando*2 - $semestre_atual%2 - 1;
                    }

                    $disciplinas=disciplina::model()->findAllBySql("SELECT * FROM disciplina WHERE id_curso = :id_curso AND semestre = :semestre",
                            array(':id_curso'=>$curso_aluno->id_curso, ':semestre'=>$semestre_cursando));

                    foreach($disciplinas as $disciplina){
                        $sql = "SELECT * FROM oferecimento " .
                            "WHERE id_disciplina = " . $disciplina->id_disciplina .
                                " AND YEAR(data_inicio) = " . (int)date("Y") .
                                " AND MONTH(data_inicio) BETWEEN " . ($semestre_atual = 1? 0 : 7) .
                                " AND " . ($semestre_atual = 1? 6 : 12);

                        $temp=oferecimento::model()->findAllBySql($sql);

                        $oferecimentos = $oferecimentos + $temp;
                    }
                }
            }

            $dataProvider=new CActiveDataProvider('Oferecimento', array(
                'pagination'=>array(
                    'pageSize'=>20,
                ),
            ));

            $dataProvider->setData($oferecimentos);

            $this->render('oferecimentoDisponivel',array(
                    'dataProvider'=>$dataProvider,
            ));
        }
    }

    public function actionInscricaoOferecimento(){
        if(isset($_REQUEST['id_aluno']) && isset($_REQUEST['id_oferecimento'])){
            //TODO
            $oferecimento_aluno= new $oferecimento_aluno;
        }

    }
}
