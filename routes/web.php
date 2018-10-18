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
//    Schema::table('users', function ($table) {
//            $table->integer("nationalid")->default(1);
//        });
    return view('welcome');
});

Route::resource('posts','PostsController');
Route::resource('social','SocialController');
Route::resource('profile','ProfileController');
Route::resource('home','HomeController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('home/addcomment', 'HomeController@addcomment');

