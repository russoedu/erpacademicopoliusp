<?php

class Livro extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Livro':
	 * @var integer $ID
	 * @var string $nome
	 * @var string $autor
	 * @var double $ISDN
	 * @var string $numClassfica
	 * @var string $editor
	 * @var integer $ano
	 * @var string $local
	 * @var integer $biblioteca_id
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
		return 'Livro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, autor, ISDN, numClassfica, editor, ano, local', 'required'),
			array('ano, biblioteca_id', 'numerical', 'integerOnly'=>true),
			array('ISDN', 'numerical'),
			array('nome, autor, numClassfica, editor, local', 'length', 'max'=>255),
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
			'biblioteca' => array(self::BELONGS_TO, 'Biblioteca', 'biblioteca_id'),
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
			'autor' => 'Autor',
			'ISDN' => 'Isdn',
			'numClassfica' => 'Número de Classficação',
			'editor' => 'Editor',
			'ano' => 'Ano',
			'local' => 'Local',
			'biblioteca_id' => 'Biblioteca',
		);
	}
}