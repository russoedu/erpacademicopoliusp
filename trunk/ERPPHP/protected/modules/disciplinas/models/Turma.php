<?php

class Turma extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Turma':
	 * @var integer $ID
	 * @var string $nome
	 * @var integer $disciplina_id
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
		return 'Turma';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, disciplina_id', 'required'),
			array('disciplina_id', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>255),
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
			'disciplina' => array(self::BELONGS_TO, 'Disciplina', 'disciplina_id'),
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
			'disciplina_id' => 'Disciplina',
		);
	}
}