<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;
class CustomAuthController extends Controller
{

    //For registration form
    public function  showRegisterForm(){
        return view('auth.register');
    }

    public function register(Request $request){

        $this->validation($request);
        $request['password'] = bcrypt($request->password);
        User::create($request->all());
        return redirect ('/')->with('Status','You have been registered with');
        //return $request->all();
    }


    public function validation($request){
        return $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' =>'required|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6|confirmed',
            'gender' => 'required|in:male,female',
            'birthday' => 'required|date',
            'q1' => 'required',
            'q2' => 'required',
            'q3' => 'required',
            'q4' => 'required',
            'q5' => 'required',
            'q6' => 'required',
            'q7' => 'required',
            'q8' => 'required',
            'q9' => 'required',
            'q10' => 'required'
        ]);
    }

    //For login form
    public function showLoginForm(){
        return view('auth.login');
    }



    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
            ]);

        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect('/home');
        }
        return view('auth.login');
}

    //for logout
    public function logout(Request $request) {
        Auth::logout();
        return view('auth.login');
    }



}
