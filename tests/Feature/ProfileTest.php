<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

/**
 * Anything to do with profile page
 */
class ProfileTest extends TestCase
{
    private $user;
    /**
     * Set up authenticated user for all tests
     */
    public function setUp()
    {
        parent::setUp();
        // User::first() will return first user in database otherwise use User::where
        $this->user = User::where('firstname','female')->first();
        // dd($this->user); // this prints all the user data for this user
        $this->be($this->user);
    }

    /**
     * Test if authenticated user can access profile page
     */
    public function testAccess()
    {
        $response = $this->getResponse();
        $response->assertSuccessful();
        //$response->assertStatus(200); // http status code 200 means ok
    }

    /**
     * This test targets the details of the user: FemaleUser 
     */
    public function testMyDetails()
    {
        $response = $this->getResponse();
        // assertEquals and assertSee virtually the same, assertSee just makes sure this data is displayed
        $this->assertEquals('Female', $this->user->firstname);
        $this->assertEquals('female@gmail.com', $this->user->email);
        $this->assertEquals('1995-01-01', $this->user->birthday);
        $this->assertEquals(3018, $this->user->postcode);
        $response->assertSee($this->user->firstname);
        $response->assertSee($this->user->email);
        $response->assertSee($this->user->birthday);
        $response->assertSee((string)$this->user->postcode); //postcode is an int
    }

    /**
     * Test to make sure about me is filled in with user about me details
     */
    public function testAboutMe()
    {
        $response = $this->getResponse();
        $response->assertSee('About Me');
        $response->assertSee($this->user->aboutme);
    }

    /**
     * Test to see if can see questions answered on profile page
     */
    public function testQuestions()
    {
        $response = $this->getResponse();
        // These test may not be reliable as they are case sensitive
        $response->assertSee('My Questions/Preferences');
        $response->assertSee('Favourite Movie Genre');
        $response->assertSee('I am looking for');
        $response->assertSee('My Level of Education is');
        $response->assertSee('Education of my ideal match is');
        $response->assertSee('My activity level');
        $response->assertSee('Stay at home or go out');
        $response->assertSee('Am I funny');
        $response->assertSee('Eat out or at home');
        $response->assertSee('Animal lover');
        $response->assertSee('Play a musical instrument');
        $response->assertSee('Do you admit mistakes');
        $response->assertSee('Like reading');
        $response->assertSee('Do I believe in fate');
    }

    /**
     * Test the check if edit buttons are displayed
     */
    public function testEditButtons()
    {
        $response = $this->getResponse();
        $response->assertSee('Edit Profile Picture Here');
        $response->assertSee('Edit Profile Here');
    }

    /**
     * Basic test to see if navbar and footer displayed on page
     */
    public function testNavFooter()
    {
        $response = $this->getResponse();
        $response->assertSee('navbar');
        $response->assertSee('footer');
    }

    /**
     * Method to get response from an authenticated user to profile page
     */
    public function getResponse()
    {
        $response = $this->actingAs($this->user)
        ->get('/profile');
        return $response;
    }
}
