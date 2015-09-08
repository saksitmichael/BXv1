<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     // return view('welcome',['Name' => 'User1']);
// 	return view('register');
// });

// Route::get('regis',function() {
// 	return view('register');
// });

Route::controller('/','UserController');