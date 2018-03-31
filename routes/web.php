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
Route::get('/dashboard/newbtc', 'WalletController@createWalletBtc')->name('new.btc');
Route::get('/dashboard/newltc', 'WalletController@createWalletLtc')->name('new.ltc');
Route::get('/dashboard/newdoge', 'WalletController@createWalletDoge')->name('new.doge');

Route::get('/dashboard/btc/send', 'WalletController@sendBtc')->name('send.btc');
Route::get('/dashboard/btc/history', 'WalletController@historyBtc')->name('history.btc');
Route::get('/dashboard/ltc/send', 'WalletController@sendLtc')->name('send.ltc');
Route::get('/dashboard/ltc/history', 'WalletController@historyLtc')->name('history.ltc');
Route::get('/dashboard/doge/send', 'WalletController@sendDoge')->name('send.doge');
Route::get('/dashboard/doge/history', 'WalletController@historyDoge')->name('history.doge');

Route::get('/dashboard/select/wallet/send', 'WalletController@showSelectWalletSend')->name('select.wallet.send');
Route::get('/dashboard/select/wallet/history', 'WalletController@showSelectWalletHistory')->name('select.wallet.history');
Route::get('/dashboard/select/wallet', 'WalletController@redirectTo');
Route::post('/dashboard/select/wallet', 'WalletController@selectWallet')->name('select.wallet');

Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/sign','Auth\RegisterController@showRegistrationForm')->name('sign');
Route::post('/sign','Auth\RegisterController@register')->name('sign');

Route::get('/recovery','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('/recovery/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/recovery/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/recovery', 'Auth\ResetPasswordController@reset')->name('password.request');;

Route::get('/transfer',function (){
    return view( 'send_money');
});


Route::get('/dash',function (){
    return view('dashboard');
});
