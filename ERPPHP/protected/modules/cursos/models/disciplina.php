<?php

class disciplina extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'disciplina':
	 * @var integer $id_disciplina
	 * @var integer $id_curso
	 * @var integer $id_professor_responsavel
	 * @var string $nome
	 * @var string $sigla
	 * @var integer $creditos_aula
	 * @var integer $creditos_trabalho
	 * @var integer $semestre
	 * @var string $programa
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
		return 'disciplina';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curso, id_professor_responsavel, nome, sigla, creditos_aula, creditos_trabalho, semestre', 'required'),
			array('id_curso, id_professor_responsavel, creditos_aula, creditos_trabalho, semestre', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>100),
			array('sigla', 'length', 'max'=>10),
			array('programa', 'safe'),
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
			'id_curso0' => array(self::BELONGS_TO, 'Curso', 'id_curso'),
			'id_professor_responsavel0' => array(self::BELONGS_TO, 'Professor', 'id_professor_responsavel'),
			'oferecimentos' => array(self::HAS_MANY, 'Oferecimento', 'id_disciplina'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_disciplina' => 'Id Disciplina',
			'id_curso' => 'Id Curso',
			'id_professor_responsavel' => 'Id Professor Responsavel',
			'nome' => 'Nome',
			'sigla' => 'Sigla',
			'creditos_aula' => 'Creditos Aula',
			'creditos_trabalho' => 'Creditos Trabalho',
			'semestre' => 'Semestre',
			'programa' => 'Programa',
		);
	}
}