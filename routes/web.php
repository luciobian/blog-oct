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

Auth::routes(['reset' => false]);

Route::get('/home', 'ArticleController@index')->name('home');


Route::group(['middleware'=>'auth'], function(){
    Route::get("/create", "ArticleController@create");
    Route::get("/edit/{article}", "ArticleController@edit");
    Route::put("/articles/{article}", "ArticleController@update");
    Route::delete("/articles/{article}", "ArticleController@destroy")->name('delete');
    Route::post("/articles/{article}/likes", "ArticleController@postLike");
    Route::post('/article', "ArticleController@store");
});

Route::post("/search", "ArticleController@search");


Route::get('/articles/{article}', 'ArticleController@show');
