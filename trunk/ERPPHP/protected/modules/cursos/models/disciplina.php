<?php

class disciplina extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'disciplina':
	 * @var integer $ID
	 * @var string $nome
	 * @var string $sigla
	 * @var string $ementa
	 * @var string $professoresResponsaveis
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
			array('nome, sigla, ementa, professoresResponsaveis', 'required'),
			array('nome, professoresResponsaveis', 'length', 'max'=>255),
			array('sigla', 'length', 'max'=>10),
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
			'turmas' => array(self::HAS_MANY, 'Turma', 'disciplina_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'Id',
			'nome' => 'Nome',
			'sigla' => 'Sigla',
			'ementa' => 'Ementa',
			'professoresResponsaveis' => 'Professores Responsaveis',
		);
	}
}