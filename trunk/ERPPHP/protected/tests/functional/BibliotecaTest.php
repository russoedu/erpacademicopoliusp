<?php

class BibliotecaTest extends WebTestCase
{
	public $fixtures=array(
		'bibliotecas'=>'Biblioteca',
	);

	public function testShow()
	{
		$this->open('?r=biblioteca/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=biblioteca/create');
	}

	public function testUpdate()
	{
		$this->open('?r=biblioteca/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=biblioteca/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=biblioteca/index');
	}

	public function testAdmin()
	{
		$this->open('?r=biblioteca/admin');
	}
}
