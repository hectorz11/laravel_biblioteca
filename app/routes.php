<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
Route::get('/', array('as' => '/', 'uses' => 'PageController@getIndex'));
/*------------------------------------------------------------------------------------------------
/*
| Bilioteca CRUD (GET)
*/
Route::get('/biblioteca', array(
	'as' => 'biblioteca', 'uses' => 'LibroController@getBiblioteca'));
/* Busqueda de Libros (GET) */
Route::get('/datalibros', array(
	'as' => 'datalibros', 'uses' => 'LibroController@getDataTable'));
/* Busqueda de Libros (GET) */
Route::get('/libro/search', array(
	'as' => 'libro_search', 'uses' => 'LibroController@getLibroSearch'));
/*
| Hemeroteca (GET)
*/
Route::get('/hemeroteca', array(
	'as' => 'hemeroteca', 'uses' => 'PeriodicoController@getHemeroteca'));
/* Busqueda de Periodicos (GET) */
Route::get('/periodico/search', array(
	'as' => 'periodico_search', 'uses' => 'PeriodicoController@getPeriodicoSearch'));
/*
| Grupo CSRF
*/
Route::group(array('before' => 'csrf'), function(){
	/* Busqueda de Libros (POST) */
	Route::post('/libro/views', array(
		'as' => 'libro_search_post', 'uses' => 'LibroController@postLibroSearch'));
	/* Busqueda de Periodicos (POST) */
	Route::post('/periodico/views', array(
		'as' => 'periodico_search_post', 'uses' => 'PeriodicoController@postPeriodicoSearch'));
});
/*------------------------------------------------------------------------------------------------*/
/*
| Guest
*/
Route::group(array('before' => 'guest'), function() {
	
	Route::group(array('before' => 'csrf'), function() {
		Route::post('/login', array(
			'as' => 'login_post', 'uses' => 'AccountController@postLogin'));
		Route::post('/register', array(
			'as' => 'register_post', 'uses' => 'AccountController@postRegister'));
	});
});

Route::get('/logout', array(
	'as' => 'logout', 'uses' => 'AccountController@getLogout'));
/*------------------------------------------------------------------------------------------------*/
/*
| Administrador
*/
Route::group(array('before' => 'admin'), function() {
	/* Libro: CRUD (GET) */
	Route::get('/libro/create', array(
	'as' => 'libro_create', 'uses' => 'LibroController@getLibroCreate'));
	Route::get('/libro/update/{id}', array(
		'as' => 'libro_update', 'uses' => 'LibroController@getLibroUpdate'));
	Route::get('/libro/delete/{id}', array(
		'as' => 'libro_delete', 'uses' => 'LibroController@getLibroDelete'));
	/* Periodico: CRUD (GET) */
	Route::get('/periodico/create', array(
		'as' => 'periodico_create', 'uses' => 'PeriodicoController@getPeriodicoCreate'));
	Route::get('/periodico/update/{id}', array(
		'as' => 'periodico_update', 'uses' => 'PeriodicoController@getPeriodicoUpdate'));
	Route::get('/periodico/delete/{id}', array(
		'as' => 'periodico_delete', 'uses' => 'PeriodicoController@getPeriodicoDelete'));
	/*
	| Grupo CSRF
	*/
	Route::group(array('before' => 'csrf'), function() {
		/* Libro: CRUD (POST) */
		Route::post('/libro/create', array(
			'as' => 'libro_create_post', 'uses' => 'LibroController@postLibroCreate'));
		Route::post('/libro/update/{id}', array(
			'as' => 'libro_update_post', 'uses' => 'LibroController@postLibroUpdate'));
		Route::post('/libro/delete/{id}', array(
			'as' => 'libro_delete_post', 'uses' => 'LibroController@postLibroDelete'));
		/* Periodico: CRUD (POST) */
		Route::post('/periodico/create', array(
			'as' => 'periodico_create_post', 'uses' => 'PeriodicoController@postPeriodicoCreate'));
		Route::post('/periodico/update/{id}', array(
			'as' => 'periodico_update_post', 'uses' => 'PeriodicoController@postPeriodicoUpdate'));
		Route::post('/periodico/delete/{id}', array(
			'as' => 'periodico_delete_post', 'uses' => 'PeriodicoController@postPeriodicoDelete'));
	});
});
/*------------------------------------------------------------------------------------------------*/
/*
| Usuario
*/
Route::group(array('before' => 'user'), function() {
	Route::get('/libro/view', array(
		'as' => 'libro_view', 'uses' => 'LibroController@getLibroView'));
	Route::get('/periodico/views', array(
		'as' => 'periodico_view', 'uses' => 'PeriodicoController@getPeriodicoView'));
	Route::get('/subscribirse', array(
		'as' => 'subscribirse', 'uses' => 'PageController@getSubscribirse'));
	/*
	| Grupo CSRF
	*/
	Route::group(array('before' => 'csrf'), function() {
		Route::post('/subscribirse', array(
			'as' => 'subscribirse_post', 'uses' => 'PageController@postSubscribirse'));
	});
});