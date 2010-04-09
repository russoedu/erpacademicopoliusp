<?php

class curso_aluno extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'curso_aluno':
	 * @var integer $id_curso
	 * @var integer $id_aluno
	 * @var string $status
	 * @var string $ano_inicio
	 * @var string $semestre_inicio
	 * @var string $ano_fim
	 * @var string $semestre_fim
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
		return 'curso_aluno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curso, id_aluno, ano_inicio, semestre_inicio', 'required'),
			array('id_curso, id_aluno', 'numerical', 'integerOnly'=>true),
			array('status, semestre_inicio, semestre_fim', 'length', 'max'=>8),
			array('ano_inicio, ano_fim', 'length', 'max'=>4),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_curso' => 'Id Curso',
			'id_aluno' => 'Id Aluno',
			'status' => 'Status',
			'ano_inicio' => 'Ano Inicio',
			'semestre_inicio' => 'Semestre Inicio',
			'ano_fim' => 'Ano Fim',
			'semestre_fim' => 'Semestre Fim',
		);
	}
}