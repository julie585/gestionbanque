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

//Route::get('/login/inscription','LoginController@inscription');

//Route::post('/login/inscrit','LoginController@validation');



Route::group(['prefix'=>'api'],function (){
    Route::resource('inscription','InscriptionController');
  });



Route::group(['prefix' => 'superieur'], function () {
  Route::get('/login', 'SuperieurAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'SuperieurAuth\LoginController@login');
  Route::post('/logout', 'SuperieurAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'SuperieurAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'SuperieurAuth\RegisterController@register');

  Route::post('/password/email', 'SuperieurAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'SuperieurAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'SuperieurAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'SuperieurAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'employe'], function () {
  Route::get('/login', 'EmployeAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'EmployeAuth\LoginController@login');
  Route::post('/logout', 'EmployeAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'EmployeAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'EmployeAuth\RegisterController@register');

  Route::post('/password/email', 'EmployeAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'EmployeAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'EmployeAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'EmployeAuth\ResetPasswordController@showResetForm');
});

route::get('contact','InscriptionController@contact');
