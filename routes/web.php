<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/profile', function () {
    //return view('profile');
//});

Route::get('/tempprofile', function () {
    return view('tempprofile');
});


Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'ResetPasswordController@reset');



Route::get('Register','CustomAuthController@showRegisterForm')->name('auth.register');
Route::post('Register','CustomAuthController@register');

Route::get('Login','CustomAuthController@showLoginForm')->name('auth.login');
Route::post('Login','CustomAuthController@login');

Route::post('Logout','CustomAuthController@logout')->name('auth.logout');

Route::get('image-upload','S3ImageController@getImage');
Route::post('image-upload','S3ImageController@imageUploadPost');
Route::get('image-upload','S3ImageController@imageUpload');