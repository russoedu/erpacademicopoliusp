<?php

class oferecimento extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'oferecimento':
	 * @var integer $id_oferecimento
	 * @var integer $id_disciplina
	 * @var integer $id_professor
	 * @var integer $id_turma
	 * @var integer $id_sala
	 * @var string $data_inicio
	 * @var string $data_fim
	 * @var integer $vagas
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'oferecimento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_disciplina, id_professor, id_turma, id_sala, data_inicio, data_fim, vagas', 'required'),
			array('id_disciplina, id_professor, id_turma, id_sala, vagas', 'numerical', 'integerOnly'=>true),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'horarios' => array(self::HAS_MANY, 'Horario', 'id_oferecimento'),
			'id_disciplina0' => array(self::BELONGS_TO, 'Disciplina', 'id_disciplina'),
			'id_professor0' => array(self::BELONGS_TO, 'Professor', 'id_professor'),
			'alunos' => array(self::MANY_MANY, 'Aluno', 'oferecimento_aluno(id_oferecimento, id_aluno)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_oferecimento' => 'Id Oferecimento',
			'id_disciplina' => 'Id Disciplina',
			'id_professor' => 'Id Professor',
			'id_turma' => 'Id Turma',
			'id_sala' => 'Id Sala',
			'data_inicio' => 'Data Inicio',
			'data_fim' => 'Data Fim',
			'vagas' => 'Vagas',
		);
	}
}