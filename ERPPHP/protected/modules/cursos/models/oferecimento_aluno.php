<?php

class oferecimento_aluno extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'oferecimento_aluno':
	 * @var integer $id_oferecimento
	 * @var integer $id_aluno
	 * @var string $nota_final
	 * @var string $frequencia_final
	 * @var integer $aprovado
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
		return 'oferecimento_aluno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aprovado', 'numerical', 'integerOnly'=>true),
			array('nota_final, frequencia_final', 'length', 'max'=>2),
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
			'id_oferecimento' => 'Id Oferecimento',
			'id_aluno' => 'Id Aluno',
			'nota_final' => 'Nota Final',
			'frequencia_final' => 'Frequência Final',
			'aprovado' => 'Aprovado',
		);
	}
}