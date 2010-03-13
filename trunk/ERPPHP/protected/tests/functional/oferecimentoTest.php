<?php

class oferecimentoTest extends WebTestCase
{
	public $fixtures=array(
		'oferecimentos'=>'oferecimento',
	);

	public function testShow()
	{
		$this->open('?r=oferecimento/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=oferecimento/create');
	}

	public function testUpdate()
	{
		$this->open('?r=oferecimento/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=oferecimento/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=oferecimento/index');
	}

	public function testAdmin()
	{
		$this->open('?r=oferecimento/admin');
	}
}
