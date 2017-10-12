<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;

class DatabaseTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDatabaseTypes()
    {
        $user = User::first();
        $this->assertInternalType("int", $user->id);
        $this->assertInternalType("string", $user->firstname);
        $this->assertInternalType("string", $user->lastname);
        $this->assertInternalType("string", $user->username);
        $this->assertInternalType("string", $user->email);
        $this->assertInternalType("string", $user->password);
        $this->assertInternalType("string", $user->gender);
        $this->assertInternalType("string", $user->looking);
        $this->assertInternalType("string", $user->myedu);
        $this->assertInternalType("string", $user->matchingedu);
        $this->assertInternalType("string", $user->birthday); // type date does not seem valid, but this test passes for string
        $this->assertInternalType("int", $user->q1);
        $this->assertInternalType("int", $user->q2);
        $this->assertInternalType("int", $user->q3);
        $this->assertInternalType("int", $user->q4);
        $this->assertInternalType("int", $user->q5);
        $this->assertInternalType("int", $user->q6);
        $this->assertInternalType("int", $user->q7);
        $this->assertInternalType("int", $user->q8);
        $this->assertInternalType("int", $user->q9);
        $this->assertInternalType("int", $user->q10);
        $this->assertInternalType("int", $user->postcode);
        $this->assertInternalType("string", $user->aboutme);
        
    }
}
