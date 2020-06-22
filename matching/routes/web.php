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
    // 登録画面
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register.form');
    // 登録処理
    Route::post('register', 'Auth\RegisterController@register')->name('register');

    // ログイン画面
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login.form');
    // ログイン処理
    Route::post('login', 'Auth\LoginController@login')->name('login');
    // ログアウト
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    // Home画面表示
    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'user/'], function () {
        // profile詳細画面
        Route::get('{user_id}/profile', 'ProfileController@show')->name('profile.show');
        // profile登録画面
        Route::get('profile', 'ProfileController@create')->name('profile.create');
        // profile登録
        Route::post('profile', 'ProfileController@store')->name('profile.store');
        // profile編集画面
        Route::get('{user_id}/profile/edit', 'ProfileController@edit')->name('profile.edit');
        // profile更新
        Route::put('{user_id}/profile', 'ProfileController@update')->name('profile.update');
        
        // matching希望送信
        Route::post('match', 'MatchController@sendMatching')->name('match');
        // matching希望送信対象一覧表示
        Route::get('match/list', 'MatchController@sentMatchingUsersList')->name('match.sent');
        // matching希望受信一覧表示
        Route::get('match/recive/list', 'MatchController@reciveMatchingUsersList')->name('match.recive');
        // matching承認
        Route::post('match/approval', 'MatchController@approvalMatching');

        // chat一覧画面
        Route::get('chat', 'ChatController@index')->name('chat.index');
    });

    Route::group(['prefix' => 'users/'], function () {
        // user一覧画面
        Route::get('', 'UserController@index')->name('index');
        // user検索
        Route::get('search', 'UserController@search')->name('search');
    });
});
