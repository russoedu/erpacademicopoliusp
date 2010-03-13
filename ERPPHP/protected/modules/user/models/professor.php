<?php

class professor extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'professor':
	 * @var integer $id_professor
	 * @var string $nome
	 * @var integer $tbl_users_id
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
		return 'professor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_professor, nome, tbl_users_id', 'required'),
			array('id_professor, tbl_users_id', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>100),
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
			'disciplinas' => array(self::HAS_MANY, 'Disciplina', 'id_professor_responsavel'),
			'oferecimentos' => array(self::HAS_MANY, 'Oferecimento', 'id_professor'),
			'tbl_users' => array(self::BELONGS_TO, 'Users', 'tbl_users_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_professor' => 'Id Professor',
			'nome' => 'Nome',
			'tbl_users_id' => 'Tbl Users',
		);
	}
}