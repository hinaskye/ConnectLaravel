<?php

namespace Tests\Unit;

use Tests\TestCase;
use Auth\User;

class AuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAuth()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
                         ->get('/home');
    }
}
