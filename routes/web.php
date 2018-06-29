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

// ログイン・ログアウト
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->get('logout', 'Auth\LoginController@logout')->name('logout');

// 新規登録
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

Route::get('/', 'Front\HomeController@index')->name('home');

// キャラリスト・詳細
Route::get('/list', 'Front\CharacterController@index')->name('character.list');
Route::get('/character/{id}', 'Front\CharacterController@detail')->where(['id' => '[0-9]+'])->name('character.detail');
