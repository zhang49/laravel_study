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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('index', 'SitesController@index');
Route::get('database',function(){
    return view('databaseform');
});
Route::get('pro',function(){
	return view('login');
});
Route::post('database','DbFormController@show');
Route::get('app',function(){
	return view('app');
});
Route::get('pro/{name}',function ($name){
	return '$name='.$name;
});
Route::get('curl','CurlController@show');
Route::get('contact','SitesController@contact');
Route::get('/','HomeController@index');
Route::get('/article','ArticlesController@index');
Route::get('/article/create',function(){
	return view('articles.create');
});
Route::get('/article/downloadlist','ArticlesController@showdownloadlist');
Route::get('/article/{id}','ArticlesController@showarticle')->name('id');
Route::post('/article/store','ArticlesController@store');
Route::get('/article/modify/{id}','ArticlesController@modify')->name('id');
Route::get('/article/remove/{id}','ArticlesController@remove')->name('id');
Route::group(['prefix'=>'user','middleware'=>'auth'],function(){
	Route::get('id',function(){
		return "Hello Laravel!!!";
	});
	Route::get('name',function(){
		return "Hello Laravel!!!";
	});
});
