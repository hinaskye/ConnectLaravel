<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class ProfileTest extends TestCase
{
    /**
     * Test if authenticated user can access profile page
     */
    public function testAccess()
    {
        $user = User::where('firstname','female')->first();
        //dd($user); // this prints all the user data for this user
        $this->be($user);

        $response = $this->actingAs($user)
                         ->get('/profile');
        $response->assertStatus(200);
    }
}
