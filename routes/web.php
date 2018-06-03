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

Route::view('admin/login', 'admin.auth.login');
Route::post('admin/login', 'Auth\LoginController@login');

Route::view('admin/forgot-password', 'admin.auth.forgot-password');
Route::post('admin/forgot-password', 'Auth\ForgotPasswordController@sendResetLinkEmail');

Route::get('admin/reset-password/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('admin/reset-password', 'Auth\ResetPasswordController@reset')->name('password.request');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
    Route::get('/', 'UsersController@index');
    Route::post('users', 'UsersController@store');
    Route::post('users/{user}', 'UsersController@update');
    Route::delete('users/{user}', 'UsersController@delete');

    Route::post('reset-user-password', 'UserPasswordController@update');
});
