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
        //redirect to the login page and log in a registered user
        $this->get('/Login');
        $this->setField('email','KP123@gmail.com');
        $this->setField('password','123456');
        $this->click('Login');


        // $formData = array(
        //         'email' => 'KP123@gmail.com',
        //         'password' => '123456',
        //     );

        //     $form = $this->create(TestedType::class);

        //     $object = TestObject::fromArray($formData);

        //     // submit the data to the form directly
        //     $form->submit($formData);

        //     $this->assertTrue($form->isSynchronized());
        //     $this->assertEquals($object, $form->getData());

        //     $view = $form->createView();
        //     $children = $view->children;

        //     foreach (array_keys($formData) as $key) {
        //         $this->assertArrayHasKey($key, $children);
        //     }
            //redirect back to home to check if it is the correct user logged in
             ->seePageIs('/home')
             ->see('Katy Perry');
    }

}
    public function testRegisterNewUser(){
        //redirect to register page
        //create a new user
    	$this->visit('/Register')
    		 ->type('Test','firstname')
    		 ->type('User','lastname')
    		 ->type('Test User','username')
    		 ->type('T.User@gmail.com','email')
    		 ->type('123456','password')
    		 ->type('123456','password_comfirmation')
    		 ->type('1997-09-07','birthday')
    		 ->select('gender','male')
    		 ->select('myedu','Highschool')
    		 ->select('matchingedu','Highschool')
    		 ->select('q1','1')
    		 ->select('q2','1')
    		 ->select('q3','1')
    		 ->select('q4','1')
    		 ->select('q5','1')
    		 ->select('q6','1')
    		 ->select('q7','1')
    		 ->select('q8','1')
    		 ->select('q9','1')
    		 ->select('q10','1')
    		 ->type('Just a Tester','aboutme')
    		 ->type('3000','postcode')
    		 ->press('Register');
    }

