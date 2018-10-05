<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::group(['namespace' => 'Frontend'], function()
{
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);   
    Route::get('{slug}', ['as' => 'cate', 'uses' => 'NewsController@newsList']);    
    Route::get('{slug}-{id}.html', ['as' => 'detail', 'uses' => 'NewsController@newsDetail']);
    Route::get('tag/{slug}', ['as' => 'tag', 'uses' => 'NewsController@tagDetail']);
});

