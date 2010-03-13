<?php

class bibliotecarioTest extends WebTestCase
{
	public $fixtures=array(
		'bibliotecarios'=>'bibliotecario',
	);

	public function testShow()
	{
		$this->open('?r=bibliotecario/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=bibliotecario/create');
	}

	public function testUpdate()
	{
		$this->open('?r=bibliotecario/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=bibliotecario/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=bibliotecario/index');
	}

	public function testAdmin()
	{
		$this->open('?r=bibliotecario/admin');
	}
}
