<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;


class passIDController extends Controller
{
    /**
    * Create view file
    *
    * @return void
    */
    public function getPassID()
    {
    	return view('tempprofile');
    }


    /**
    * Manage Post Request
    *
    * @return void
    */


    public function passID()
    {
    $varName = 1;
	  $user = DB::table('users')->select('firstname','lastname','username','email','gender','birthday','q1','q2','q3','q4','q5','q6','q7','q8','q9','q10','aboutme','postcode')->where('id',$varName)->first();
    // $user = "SELECT firstname, lastname , username , email , gender , birthday , q1 , q2 , q3 , q4 , q5 , q6 , q7 ,q8 ,q9 ,q10 , aboutme , postcode  FROM users WHERE id= $varName";
    // dd($user);
    return view('tempprofile');
	  }
}


?>
