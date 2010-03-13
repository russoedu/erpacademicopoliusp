<?php

class horario extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'horario':
	 * @var integer $id_horario
	 * @var integer $id_oferecimento
	 * @var string $dia
	 * @var string $horario_inicio
	 * @var string $horario_fim
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
		return 'horario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_horario, id_oferecimento, horario_inicio, horario_fim', 'required'),
			array('id_horario, id_oferecimento', 'numerical', 'integerOnly'=>true),
			array('dia', 'length', 'max'=>7),
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
			'id_oferecimento0' => array(self::BELONGS_TO, 'Oferecimento', 'id_oferecimento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_horario' => 'Id Horario',
			'id_oferecimento' => 'Id Oferecimento',
			'dia' => 'Dia',
			'horario_inicio' => 'Horario Inicio',
			'horario_fim' => 'Horario Fim',
		);
	}
}