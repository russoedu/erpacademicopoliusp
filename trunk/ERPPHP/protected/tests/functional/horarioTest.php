<?php

class horarioTest extends WebTestCase
{
	public $fixtures=array(
		'horarios'=>'horario',
	);

	public function testShow()
	{
		$this->open('?r=horario/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=horario/create');
	}

	public function testUpdate()
	{
		$this->open('?r=horario/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=horario/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=horario/index');
	}

	public function testAdmin()
	{
		$this->open('?r=horario/admin');
	}
}
