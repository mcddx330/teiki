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
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// 新規登録
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// キャラクター情報
Route::get('/', 'Front\HomeController@index')->name('home');

// キャラリスト・詳細
Route::get('/list', 'Front\CharacterController@index')->name('character.list');
Route::get('/character/{id}', 'Front\CharacterController@detail')->where(['id' => '[0-9]+'])->name('character.detail');

// チャット
Route::get('/chat', 'Front\ChatController@index')->name('chat.list');
Route::post('/chat', 'Front\ChatController@postChat')->name('chat.post');
Route::get('/chat/res', function () { return redirect(route('chat.list')); });
Route::post('/chat/res', 'Front\ChatController@postRes')->name('chat.res');
Route::get('/chat/delete', function () { return redirect(route('chat.list')); });
Route::post('/chat/delete', 'Front\ChatController@postDelete')->name('chat.delete');
Route::get('/chat/tree/{id}', 'Front\ChatController@tree')->where(['id' => '[0-9]+'])->name('chat.tree');
