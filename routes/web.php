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
Imgfly::routes();

Route::get('/403',function(){
    abort(403);
});

Route::get('/404',function(){
    abort(404);
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('sitemap.xml', 'SitemapController@index');
Route::get('portfolio/{path?}', 'UrlController@index')->where('path', '[a-zA-Z0-9\-/_]+')->name('portfolio');
Route::get('{page?}', 'UrlController@index')->where('page', '^[a-zA-Z0-9-_]+$')->name('page');
