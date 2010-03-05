<?php

class emprestimoTest extends WebTestCase
{
	public $fixtures=array(
		'emprestimos'=>'emprestimo',
	);

	public function testShow()
	{
		$this->open('?r=emprestimo/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=emprestimo/create');
	}

	public function testUpdate()
	{
		$this->open('?r=emprestimo/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=emprestimo/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=emprestimo/index');
	}

	public function testAdmin()
	{
		$this->open('?r=emprestimo/admin');
	}
}
