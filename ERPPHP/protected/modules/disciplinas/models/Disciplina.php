<?php

class Disciplina extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Disciplina':
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
		return 'Disciplina';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('nome', 'length' , 'max'=>255),
                    array('sigla', 'length', 'max' =>10),
                    array('professoresResponsaveis', 'length', 'max' => 100),
                    array('ementa , nome , sigla , professoresResponsaveis' , 'required'),
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
                    'nome' => 'Nome da Disciplina',
                    'sigla' => 'Sigla da Disciplina',
                    'ementa' => 'Ementa da Disciplina',
                    'professoresResponsaveis' => 'Professores Responsáveis',
		);
	}
}