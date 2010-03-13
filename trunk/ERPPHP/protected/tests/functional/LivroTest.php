<?php

class livroTest extends WebTestCase
{
	public $fixtures=array(
		'livros'=>'livro',
	);

	public function testShow()
	{
		$this->open('?r=livro/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=livro/create');
	}

	public function testUpdate()
	{
		$this->open('?r=livro/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=livro/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=livro/index');
	}

	public function testAdmin()
	{
		$this->open('?r=livro/admin');
	}
}
