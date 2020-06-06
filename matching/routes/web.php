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

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// user
Route::group(['as' => 'user.', 'namespace' => 'user'], function () {
    // 登録画面表示
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register.form');
    // 登録処理
    Route::post('register', 'Auth\RegisterController@register')->name('register');

    // ログイン画面表示
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.form');
    // ログイン処理
    Route::post('login', 'Auth\LoginController@login')->name('login');
    // ログアウト
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    // Home画面表示
    Route::get('/', 'HomeController@index')->name('home');

    // profile詳細画面表示
    Route::get('profile/{id}', 'ProfileController@show')->name('profile.show');
    // profile登録画面表示
    Route::get('profile', 'ProfileController@create')->name('profile');
    // profile登録
    Route::post('profile', 'ProfileController@store')->name('profile');
    // profile編集画面表示
    Route::get('profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');
    // profile更新
    Route::put('profile/{id}', 'ProfileController@update')->name('profile');

});
