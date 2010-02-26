<?php

class TurmaTest extends WebTestCase
{
	public $fixtures=array(
		'turmas'=>'Turma',
	);

	public function testShow()
	{
		$this->open('?r=turma/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=turma/create');
	}

	public function testUpdate()
	{
		$this->open('?r=turma/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=turma/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=turma/index');
	}

	public function testAdmin()
	{
		$this->open('?r=turma/admin');
	}
}
