<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;

class ProfileAuthTest extends TestCase
{
    /**
     * Test if user gets a redirect response if they try to visit profile page
     * and user is redirected to login screen
     */
     public function testRedirectUser()
     {
         $response = $this->get('/home');
 
         // redirect response code
         $response->assertStatus(302);
         $response->assertRedirect('/Login');
     }

    /**
     * Test if authenticated user can access home page
     */
    public function testLogin()
    {
        $user = User::where('firstname','female')->first();
        //dd($user); // this prints all the user data for this user
        $this->be($user);

        $response = $this->actingAs($user)
                         ->get('/home');
        $response->assertStatus(200);
    }
}
