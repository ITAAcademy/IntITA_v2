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

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('lang/{lang}', 'LanguageController@switchLang')->name('lang.switch');

Route::get('/', 'HomeController@index');
Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail');

//information pages
Route::get('confirmation', 'Auth\RegisterController@show')->name('confirmationMsg');
Route::get('reset', 'Auth\ForgotPasswordController@show')->name('resetMsg');

Route::get('verify', 'Auth\VerificationController@show');
Route::post('resend', 'Auth\VerificationController@resend');

// social networks
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');