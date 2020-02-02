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

Route::get('/', "ArticleController@index");

Auth::routes();

Route::get('/home', 'ArticleController@index')->name('home');


Route::group(['middleware'=>'auth'], function(){
    Route::get("/create", "ArticleController@create");
});


Route::get('/articles/{article}', 'ArticleController@show');

Route::post('/article', "ArticleController@store");