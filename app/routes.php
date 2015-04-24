<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => '/', 'uses' => 'PageController@getIndex'));

Route::get('biblioteca', array('as' => 'biblioteca', 'uses' => 'LibroController@getBiblioteca'));
Route::get('libro/create', array('as' => 'libro_create', 'uses' => 'LibroController@getLibroCreate'));
Route::post('libro/create', array('as' => 'libro_create_post', 'uses' => 'LibroController@postLibroCreate'));
Route::get('libro/update/{id}', array('as' => 'libro_update', 'uses' => 'LibroController@getLibroUpdate'));
Route::post('libro/update/{id}', array('as' => 'libro_update_post', 'uses' => 'LibroController@postLibroUpdate'));
Route::get('libro/delete/{id}', array('as' => 'libro_delete', 'uses' => 'LibroController@getLibroDelete'));
Route::post('libro/delete/{id}', array('as' => 'libro_delete_post', 'uses' => 'LibroController@postLibroDelete'));
Route::get('libro/search', array('as' => 'libro_search', 'uses' => 'LibroController@getLibroSearch'));
Route::post('libro/views', array('as' => 'libro_search_post', 'uses' => 'LibroController@postLibroSearch'));

Route::get('hemeroteca', array('as' => 'hemeroteca', 'uses' => 'PeriodicoController@getHemeroteca'));
Route::get('periodico/create', array('as' => 'periodico_create', 'uses' => 'PeriodicoController@getPeriodicoCreate'));
Route::post('periodico/create', array('as' => 'periodico_create_post', 'uses' => 'PeriodicoController@postPeriodicoCreate'));
Route::get('periodico/update/{id}', array('as' => 'periodico_update', 'uses' => 'PeriodicoController@getPeriodicoUpdate'));
Route::post('periodico/update/{id}', array('as' => 'periodico_update_post', 'uses' => 'PeriodicoController@postPeriodicoUpdate'));
Route::get('periodico/delete/{id}', array('as' => 'periodico_delete', 'uses' => 'PeriodicoController@getPeriodicoDelete'));
Route::post('periodico/delete/{id}', array('as' => 'periodico_delete_post', 'uses' => 'PeriodicoController@postPeriodicoDelete'));
Route::get('periodico/search', array('as' => 'periodico_search', 'uses' => 'PeriodicoController@getPeriodicoSearch'));
Route::post('periodico/views', array('as' => 'periodico_search_post', 'uses' => 'PeriodicoController@postPeriodicoSearch'));