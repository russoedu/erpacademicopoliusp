<?php

class disciplinaTest extends WebTestCase
{
	public $fixtures=array(
		'disciplinas'=>'disciplina',
	);

	public function testShow()
	{
		$this->open('?r=disciplina/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=disciplina/create');
	}

	public function testUpdate()
	{
		$this->open('?r=disciplina/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=disciplina/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=disciplina/index');
	}

	public function testAdmin()
	{
		$this->open('?r=disciplina/admin');
	}
}
