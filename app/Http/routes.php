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

Route::get('/', function () {
    return view('auth.login');
});
Route::controllers([
    'auth'      => '\App\Http\Controllers\Auth\AuthController',
    'book'      => 'BookController',
    'class'     => 'ClassController',
    'home'      => 'HomeController',
    'level'     => 'LevelFeeController',
    'password'  => '\App\Http\Controllers\Auth\PasswordController',
    'payment'   => 'PaymentController',
    'student'   => 'StudentController',
    'teacher'   => 'TeacherController'
]);