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

// Route::get('/profile', function () {
//     return view('profile');
// });

Route::post('/uniqueprofile',['uses'=>'passIDController@userID']);

Route::get('profile','editProfileController@showEditForm')->name('views.profile');
Route::post('profile','editProfileController@update');


Route::get('/about', function () {
    return view('about');
});

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

Route::get('editImage','S3ImageController@imageUpload');
Route::post('editImage','S3ImageController@imageUploadPost');

//Route::get('s3-image-upload','S3ImageController@imageUpload');
//Route::post('s3-image-upload','S3ImageController@imageUploadPost');

Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});
