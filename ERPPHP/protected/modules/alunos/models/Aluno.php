<?php

class Aluno extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Aluno':
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
		return 'Aluno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                    array('firstName', 'length', 'max' =>50),
                    array('lastName' ,'length', 'max' =>50),
                    array('email', 'email'),
                    array('firstName , lastName , email', 'required'),
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
                    'ID' => 'Matricula',
                    'firstName' => 'First Name',
                    'lastName' => 'Last Name',
                    'email' => 'E-mail'
		);
	}
}