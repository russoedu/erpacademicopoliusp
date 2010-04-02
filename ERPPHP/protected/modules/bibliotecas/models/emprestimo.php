<?php

class emprestimo extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'emprestimo':
	 * @var integer $id_emprestimo
	 * @var string $data_retirada
	 * @var string $data_devolucao
	 * @var integer $id_aluno
	 * @var integer $id_livro
         * @var string $data_devolucao_efetiva
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
			array('data_retirada, data_devolucao, id_aluno, id_livro', 'required'),
			array('id_aluno, id_livro', 'numerical', 'integerOnly'=>true),
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
			'aluno' => array(self::BELONGS_TO, 'Aluno', 'id_aluno'),
			'livro' => array(self::BELONGS_TO, 'Livro', 'id_livro'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_emprestimo' => 'Id Empréstimo',
			'data_retirada' => 'Data de Retirada',
			'data_devolucao' => 'Data de Devolução',
			'id_aluno' => 'Id Aluno',
			'id_livro' => 'Id Livro',
                        'data_devolucao_efetiva' => 'Data de Devolução Efetiva',
		);
	}
}