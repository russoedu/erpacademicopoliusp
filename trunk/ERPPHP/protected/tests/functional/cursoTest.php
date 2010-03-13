<?php

class cursoTest extends WebTestCase
{
	public $fixtures=array(
		'cursos'=>'curso',
	);

	public function testShow()
	{
		$this->open('?r=curso/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=curso/create');
	}

	public function testUpdate()
	{
		$this->open('?r=curso/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=curso/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=curso/index');
	}

	public function testAdmin()
	{
		$this->open('?r=curso/admin');
	}
}
