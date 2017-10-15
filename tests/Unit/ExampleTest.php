<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testLoginUser(){

        $this->get('/Login')
             ->assertField('KP123@gmail.com','email')
             ->assertField('123456','password')
             ->click('Login');
             // ->seePageIs('/home')
             // ->see('Katy Perry');
    }
}
    // public function testRegisterNewUser(){
    // 	$this->visit('/Register')
    // 		 ->type('Test','firstname')
    // 		 ->type('User','lastname')
    // 		 ->type('Test User','username')
    // 		 ->type('T.User@gmail.com','email')
    // 		 ->type('123456','password')
    // 		 ->type('123456','password_comfirmation')
    // 		 ->type('1997-09-07','birthday')
    // 		 ->select('gender','male')
    // 		 ->select('myedu','Highschool')
    // 		 ->select('matchingedu','Highschool')
    // 		 ->select('q1','1')
    // 		 ->select('q2','1')
    // 		 ->select('q3','1')
    // 		 ->select('q4','1')
    // 		 ->select('q5','1')
    // 		 ->select('q6','1')
    // 		 ->select('q7','1')
    // 		 ->select('q8','1')
    // 		 ->select('q9','1')
    // 		 ->select('q10','1')
    // 		 ->type('Just a Tester','aboutme')
    // 		 ->type('3000','postcode')
    // 		 ->press('Register');
    // }

