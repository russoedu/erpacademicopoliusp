<?php

class curso extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'curso':
	 * @var integer $id_curso
	 * @var string $nome
	 * @var integer $duracao
	 * @var string $periodo
	 * @var string $descricao
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
		return 'curso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, duracao, periodo', 'required'),
			array('duracao', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>100),
			array('periodo', 'length', 'max'=>15),
			array('descricao', 'safe'),
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
			'alunos' => array(self::MANY_MANY, 'Aluno', 'curso_aluno(id_curso, id_aluno)'),
			'disciplinas' => array(self::HAS_MANY, 'Disciplina', 'id_curso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_curso' => 'Id Curso',
			'nome' => 'Nome',
			'duracao' => 'Duracao',
			'periodo' => 'Periodo',
			'descricao' => 'Descricao',
		);
	}
}