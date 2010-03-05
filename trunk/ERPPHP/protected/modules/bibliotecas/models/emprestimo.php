<?php

class emprestimo extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'emprestimo':
	 * @var integer $ID
	 * @var integer $aluno_id
	 * @var integer $livro_id
	 * @var string $data_emprestimo
	 * @var string $data_combinada
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
		return 'emprestimo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aluno_id, livro_id, data_emprestimo, data_combinada', 'required'),
			array('aluno_id, livro_id', 'numerical', 'integerOnly'=>true),
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
			'aluno' => array(self::BELONGS_TO, 'Aluno', 'aluno_id'),
			'livro' => array(self::BELONGS_TO, 'Livro', 'livro_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'Id',
			'aluno_id' => 'Aluno',
			'livro_id' => 'Livro',
			'data_emprestimo' => 'Data Emprestimo',
			'data_combinada' => 'Data Combinada',
		);
	}
}