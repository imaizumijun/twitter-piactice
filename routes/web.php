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

Auth::routes();
//ホーム画面
Route::get('/home', 'HomeController@index')->name('home');
//メニュー画面
Route::get('/Menu', 'MenuController@index')->name('Menu');
//テストSame1
Route::get('/same1', 'Same1Controller@index')->name('Same1');
//テストSame2
Route::get('/same2', 'Same2Controller@index')->name('Same2');