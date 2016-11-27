<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'Home@HomePage')->middleware('password');
Route::get('login', 'Home@LoginPage');
Route::post('login', 'Home@Login');

Route::get('delete/{filename}', 'Home@Delete')->middleware('password');

Route::get('view/{filename}', 'Home@ViewImage');
