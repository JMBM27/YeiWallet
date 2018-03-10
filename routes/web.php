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

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/login',function (){
    return view('login');

});

Route::get('/sign',function(){
    return view('sign');

});

Route::get('/dashboard',function (){
    return view('dashboard');

});

Route::get('/recovery',function (){
    return view( 'forgot_psw');
});

Route::get('/recovery/code',function (){
    return view( 'confirm_code');
});

Route::get('/transfer',function (){
    return view( 'send_money');
});

