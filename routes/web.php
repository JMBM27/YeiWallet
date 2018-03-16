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
    return view('inicio');
});

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
#Route::post('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/sign','Auth\RegisterController@showRegistrationForm')->name('sign');
Route::post('/sign','Auth\RegisterController@register')->name('sign');

Route::get('/recovery','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('/recovery/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/recovery/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/recovery', 'Auth\ResetPasswordController@reset')->name('password.request');;

Route::get('/transfer',function (){
    return view( 'send_money');
});
