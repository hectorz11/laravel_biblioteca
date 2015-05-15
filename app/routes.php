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
/*------------------------------------------------------------------------------------------------
/*
| Bilioteca CRUD (GET)
*/
Route::get('biblioteca', array(
	'as' => 'biblioteca', 'uses' => 'LibroController@getBiblioteca'));
Route::get('libro/create', array(
	'as' => 'libro_create', 'uses' => 'LibroController@getLibroCreate'));
Route::get('libro/update/{id}', array(
	'as' => 'libro_update', 'uses' => 'LibroController@getLibroUpdate'));
Route::get('libro/delete/{id}', array(
	'as' => 'libro_delete', 'uses' => 'LibroController@getLibroDelete'));
/* Busqueda de Libros (GET) */
Route::get('libro/search', array(
	'as' => 'libro_search', 'uses' => 'LibroController@getLibroSearch'));
/*------------------------------------------------------------------------------------------------
/*
| Hemeroteca CRUD (GET)
*/
Route::get('hemeroteca', array(
	'as' => 'hemeroteca', 'uses' => 'PeriodicoController@getHemeroteca'));
Route::get('periodico/create', array(
	'as' => 'periodico_create', 'uses' => 'PeriodicoController@getPeriodicoCreate'));
Route::get('periodico/update/{id}', array(
	'as' => 'periodico_update', 'uses' => 'PeriodicoController@getPeriodicoUpdate'));
Route::get('periodico/delete/{id}', array(
	'as' => 'periodico_delete', 'uses' => 'PeriodicoController@getPeriodicoDelete'));
/* Busqueda de Periodicos (GET) */
Route::get('periodico/search', array(
	'as' => 'periodico_search', 'uses' => 'PeriodicoController@getPeriodicoSearch'));
/*------------------------------------------------------------------------------------------------
/*
| Grupo CSRF
*/
Route::group(array('before' => 'csrf'), function() {
	/* Bilioteca CRUD (POST) */
	Route::post('libro/create', array(
		'as' => 'libro_create_post', 'uses' => 'LibroController@postLibroCreate'));
	Route::post('libro/update/{id}', array(
		'as' => 'libro_update_post', 'uses' => 'LibroController@postLibroUpdate'));
	Route::post('libro/delete/{id}', array(
		'as' => 'libro_delete_post', 'uses' => 'LibroController@postLibroDelete'));
	/* Busqueda de Libros (POST) */
	Route::post('libro/views', array(
		'as' => 'libro_search_post', 'uses' => 'LibroController@postLibroSearch'));
	/*-------------------------------------------------------------------------------------------------
	/* Hemeroteca CRUD (POST) */
	Route::post('periodico/create', array(
		'as' => 'periodico_create_post', 'uses' => 'PeriodicoController@postPeriodicoCreate'));
	Route::post('periodico/update/{id}', array(
		'as' => 'periodico_update_post', 'uses' => 'PeriodicoController@postPeriodicoUpdate'));
	Route::post('periodico/delete/{id}', array(
		'as' => 'periodico_delete_post', 'uses' => 'PeriodicoController@postPeriodicoDelete'));
	/* Busqueda de Periodicos (POST) */
	Route::post('periodico/views', array(
		'as' => 'periodico_search_post', 'uses' => 'PeriodicoController@postPeriodicoSearch'));
	/*------------------------------------------------------------------------------------------------*/
});