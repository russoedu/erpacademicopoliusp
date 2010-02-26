<?php

class Biblioteca extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Biblioteca':
	 * @var integer $ID
	 * @var string $nome
	 * @var string $local
	 * @var string $bibliotecario
	 * @var string $outros
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
		return 'Biblioteca';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, local, bibliotecario, outros', 'required'),
			array('nome, local, bibliotecario, outros', 'length', 'max'=>255),
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
			'livros' => array(self::HAS_MANY, 'Livro', 'biblioteca_id'),
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
			'local' => 'Local',
			'bibliotecario' => 'Bibliotecario',
			'outros' => 'Outros',
		);
	}
}