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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect']], function() {
    Route::view('/', 'front.home.page');
    Route::view('services', 'front.services.page');
    Route::get('team', 'PagesController@team');
    Route::view('contact', 'front.contact.page');
});

Route::post('contact', 'ContactMessageController@receive');


Route::view('admin/login', 'admin.auth.login')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::post('admin/logout', 'Auth\LoginController@logout');

Route::view('admin/forgot-password', 'admin.auth.forgot-password');
Route::post('admin/forgot-password', 'Auth\ForgotPasswordController@sendResetLinkEmail');

Route::get('admin/reset-password/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('admin/reset-password', 'Auth\ResetPasswordController@reset')->name('password.request');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {

    Route::redirect('/', 'admin/team-members');

    Route::get('users', 'UsersController@index');
    Route::get('users/{user}', 'UsersController@show');
    Route::post('users', 'UsersController@store');
    Route::post('users/{user}', 'UsersController@update');
    Route::delete('users/{user}', 'UsersController@delete');

    Route::view('reset-user-password', 'admin.password.reset');
    Route::post('reset-user-password', 'UserPasswordController@update');

    Route::get('team-members', 'TeamMembersController@index');
    Route::get('team-members/{member}', 'TeamMembersController@show');
    Route::post('team-members', 'TeamMembersController@store');
    Route::post('team-members/{member}', 'TeamMembersController@update');
    Route::delete('team-members/{member}', 'TeamMembersController@delete');

    Route::post('published-team-members', 'PublishedTeamMembersController@store');
    Route::delete('published-team-members/{member}', 'PublishedTeamMembersController@delete');

    Route::post('team-members/{member}/avatar', 'TeamMemberAvatarController@store');
    Route::delete('team-members/{member}/avatar', 'TeamMemberAvatarController@delete');
});
