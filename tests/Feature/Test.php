<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Test extends TestCase
{
	/**
	 * A basic test example.
	 *
	 *@return void
	 */
	public function testBasicTest()
	{
		$this->assertTrue(true);
	}

	public funtion testSearch(){
		$this->get('/Login');
		$this->setField('email','CY1223@gmail.com');
		$this->setField('password','123456');
		$this->click('Login');
		$this->setField('input','Katy');
		->seePageIs('/home');
		->see('Katy Perry');
		$this->setField('input','22');
		->seePageIs('/home');
		->see('Katy Perry');
		$this->setField('input','East');
		->seePageIs('/home');
		->see('Katy Perry');
	}
	public function testFilter(){
		$this->get('/Login');
		$this->setField('email','CY1223@gmail.com');
		$this->setField('password','123456');
		$this->click('Login');
		$this->click('buttonFilter');
		$this->check('distanceCheckBox');
		$this->check('postcodeCheckBox');
		$this->check('percentCheckBox');
		$this->click('filter');
		->seePageIs('/home');
		->see('Taylor Swift');
	}
}