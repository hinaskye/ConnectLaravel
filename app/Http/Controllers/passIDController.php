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
    public function getUserID()
    {
    	return view('uniqueprofile');
    }


    /**
    * Manage Post Request
    *
    * @return void
    */


    public function userID(Request $request)
    {
    $user = $request->id;
    $user = DB::table('users')->where('id', $user)->first();
    return view('uniqueprofile')->with('user', $user);

	  }
}

?>
