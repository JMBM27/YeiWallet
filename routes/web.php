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
})->name('home');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/dashboard/newbtc','BtcController@createWallet')->name('new.btc');
Route::get('/dashboard/newltc','LtcController@createWallet')->name('new.ltc');
Route::get('/dashboard/newdoge','DogeController@createWallet')->name('new.doge');

Route::get('/dashboard/btc/send','BtcController@send')->name('send.btc');
Route::get('/dashboard/ltc/send','LtcController@send')->name('send.ltc');
Route::get('/dashboard/doge/send','DogeController@send')->name('send.doge');

Route::get('/dashboard/btc/history','BtcController@history')->name('history.btc');
Route::get('/dashboard/ltc/history','LtcController@history')->name('history.ltc');
Route::get('/dashboard/doge/history','DogeController@history')->name('history.doge');

Route::get('/dashboard/select/wallet/send', 'WalletController@showSelectWalletSend')->name('select.wallet.send');
Route::get('/dashboard/select/wallet/history', 'WalletController@showSelectWalletHistory')->name('select.wallet.history');
Route::get('/dashboard/select/wallet', 'WalletController@redirectTo');
Route::post('/dashboard/select/wallet', 'WalletController@selectWallet')->name('select.wallet');
Route::get('/dashboard/history/wallet', 'WalletController@redirectTo');
Route::post('/dashboard/history/wallet', 'WalletController@historyWallet')->name('history.wallet');
Route::get('/dashboard/send/wallet', 'WalletController@redirectTo');
Route::post('/dashboard/send/wallet', 'WalletController@sendWallet')->name('send.wallet');

Route::get('/config/update/password','ConfigController@showUpdatePasswordForm')->name('password.config');
Route::post('/config/update/password','ConfigController@updatePassword')->name('password.update');
Route::get('/config/code','ConfigController@showCodeForm')->name('code.config');
Route::post('/config/code','ConfigController@updateCode')->name('code.update');
Route::get('/config/contact','ConfigController@showMessageForm')->name('contact');
Route::post('/config/contact','ConfigController@message')->name('contact.send');

Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::post('/login','Auth\LoginController@login')->name('login');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/sign','Auth\RegisterController@showRegistrationForm')->name('sign');
Route::post('/sign','Auth\RegisterController@register')->name('sign');

Route::get('/recovery','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('/recovery/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/recovery/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/recovery', 'Auth\ResetPasswordController@reset')->name('password.request');

