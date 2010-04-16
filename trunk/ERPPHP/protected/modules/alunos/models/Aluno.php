<?php

class aluno extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'aluno':
	 * @var integer $id_aluno
	 * @var string $nome
	 * @var string $rg
	 * @var string $cpf
	 * @var string $endereco
	 * @var string $telefone
	 * @var string $celular
	 * @var string $email
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
		return 'aluno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nome, rg, cpf, endereco, telefone, celular, email, tbl_users_id', 'required'),
			array('tbl_users_id', 'numerical', 'integerOnly'=>true),
			array('nome, endereco, email', 'length', 'max'=>100),
                        array('email', 'email'),
			array('rg', 'length', 'max'=>9),
			array('cpf', 'length', 'max'=>11),
			array('telefone, celular', 'length', 'max'=>10),
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
			'tbl_users' => array(self::BELONGS_TO, 'Users', 'tbl_users_id'),
			'cursos' => array(self::MANY_MANY, 'Curso', 'curso_aluno(id_curso, id_aluno)'),
			'emprestimos' => array(self::HAS_MANY, 'Emprestimo', 'id_aluno'),
			'oferecimentos' => array(self::MANY_MANY, 'Oferecimento', 'oferecimento_aluno(id_oferecimento, id_aluno)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_aluno' => 'Número de Matrícula',
			'nome' => 'Nome',
			'rg' => 'Rg',
			'cpf' => 'Cpf',
			'endereco' => 'Endereço',
			'telefone' => 'Telefone',
			'celular' => 'Celular',
			'email' => 'E-mail',
			'tbl_users_id' => 'Tbl Users',
		);
	}
}