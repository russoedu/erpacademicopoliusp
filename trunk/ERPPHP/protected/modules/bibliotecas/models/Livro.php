<?php

class livro extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'livro':
	 * @var integer $id_livro
	 * @var integer $id_biblioteca
	 * @var integer $isbn
	 * @var integer $exemplar
	 * @var string $titulo
	 * @var string $autor
	 * @var string $editora
	 * @var string $ano
	 * @var integer $edicao
	 * @var string $local
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
		return 'livro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_biblioteca, isbn, exemplar, titulo, autor, editora, ano, edicao, local', 'required'),
			array('id_biblioteca, isbn, exemplar, edicao', 'numerical', 'integerOnly'=>true),
			array('titulo, autor', 'length', 'max'=>100),
			array('editora', 'length', 'max'=>45),
			array('ano', 'length', 'max'=>4),
			array('local', 'length', 'max'=>10),
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
			'emprestimos' => array(self::HAS_MANY, 'Emprestimo', 'id_livro'),
			'id_biblioteca0' => array(self::BELONGS_TO, 'Biblioteca', 'id_biblioteca'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_livro' => 'Id Livro',
			'id_biblioteca' => 'Id Biblioteca',
			'isbn' => 'ISBN',
			'exemplar' => 'Exemplar',
			'titulo' => 'Título',
			'autor' => 'Autor',
			'editora' => 'Editora',
			'ano' => 'Ano',
			'edicao' => 'Edição',
			'local' => 'Local',
		);
	}
}