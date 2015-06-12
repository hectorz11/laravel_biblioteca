<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/
Route::get('/', array('as' => '/', 'uses' => 'PageController@getIndex'));
/*------------------------------------------------------------------------------------------------
/*
| Busqueda de Libros (GET)
*/
/* Busqueda de Libros (GET) */
Route::get('/libro/search', array(
	'as' => 'libro_search', 'uses' => 'LibroController@getLibroSearch'));
Route::get('/datatable/libros', array(
	'as' => 'datatable-libros', 'uses' => 'LibroController@getDatatableGuest'));
/*
| Hemeroteca (GET)
*/
/* Busqueda de Periodicos (GET) */
Route::get('/periodico/search', array(
	'as' => 'periodico_search', 'uses' => 'PeriodicoController@getPeriodicoSearch'));
Route::get('/datatable/periodicos', array(
	'as' => 'datatable-periodicos', 'uses' => 'PeriodicoController@getDatatableGuest'));/*
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
	Route::post('/usuario/update/{id}', array(
		'as' => 'usuario_update_post', 'uses' => 'AccountController@postUsuarioUpdate'));
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
	Route::get('/biblioteca', array(
		'as' => 'biblioteca', 'uses' => 'LibroController@getBiblioteca'));
	Route::get('/biblioteca/no', array(
		'as' => 'biblioteca_no', 'uses' => 'LibroController@getBibliotecaNo'));
	Route::get('/data/libro', array(
		'as' => 'data-libro', 'uses' => 'LibroController@getDataLibro'));
	/* Libro: CRUD (GET) */
	Route::get('/libro/create', array(
		'as' => 'libro_create', 'uses' => 'LibroController@getLibroCreate'));
	Route::get('/libro/update/{id}', array(
		'as' => 'libro_update', 'uses' => 'LibroController@getLibroUpdate'));
	/* Busqueda de Libros (GET) */
	Route::get('/admin/datatable/libros', array(
		'as' => 'admin-datatable-libros', 'uses' => 'LibroController@getDatatableAdmin'));
	Route::get('/admin/datatable/libros/no', array(
		'as' => 'admin-datatable-libros-no', 'uses' => 'LibroController@getDatatableAdminNo'));
	
	Route::get('/hemeroteca', array(
		'as' => 'hemeroteca', 'uses' => 'PeriodicoController@getHemeroteca'));
	Route::get('/hemeroteca/no', array(
		'as' => 'hemeroteca_no', 'uses' => 'PeriodicoController@getHemerotecaNo'));
	Route::get('/data/periodico', array(
		'as' => 'data-periodico', 'uses' => 'PeriodicoController@getDataPeriodico'));
	/* Periodico: CRUD (GET) */
	Route::get('/periodico/create', array(
		'as' => 'periodico_create', 'uses' => 'PeriodicoController@getPeriodicoCreate'));
	Route::get('/periodico/update/{id}', array(
		'as' => 'periodico_update', 'uses' => 'PeriodicoController@getPeriodicoUpdate'));
	/* Busqueda de Periodicos (GET) */
	Route::get('/admin/datatable/periodicos', array(
		'as' => 'admin-datatable-periodicos', 'uses' => 'PeriodicoController@getDatatableAdmin'));
	Route::get('/admin/datatable/periodicos/no', array(
		'as' => 'admin-datatable-periodicos-no', 'uses' => 'PeriodicoController@getDatatableAdminNo'));
	/* Clasificacion CRUD (GET) */
	Route::get('/admin/clasificaciones', array(
		'as' => 'admin_clasificaciones', 'uses' => 'ClasificacionController@getClasificaciones'));
	Route::get('/admin/clasificacion/create', array(
		'as' => 'admin_clasificacion_create', 'uses' => 'ClasificacionController@getClasificacionCreate'));
	Route::get('/admin/clasificacion/update/{id}', array(
		'as' => 'admin_clasificacion_update', 'uses' => 'ClasificacionController@getClasificacionUpdate'));
	/* Estado CRUD (GET) */
	Route::get('/admin/estados', array(
		'as' => 'admin_estados', 'uses' => 'EstadoController@getEstados'));
	Route::get('/admin/estado/create', array(
		'as' => 'admin_estado_create', 'uses' => 'EstadoController@getEstadoCreate'));
	Route::get('/admin/estado/update/{id}', array(
		'as' => 'admin_estado_update', 'uses' => 'EstadoController@getEstadoUpdate'));
	/* Tipo CRUD (GET) */
	Route::get('/admin/tipos', array(
		'as' => 'admin_tipos', 'uses' => 'TipoController@getTipos'));
	Route::get('/admin/tipo/create', array(
		'as' => 'admin_tipo_create', 'uses' => 'TipoController@getTipoCreate'));
	Route::get('/admin/tipo/update/{id}', array(
		'as' => 'admin_tipo_update', 'uses' => 'TipoController@getTipoUpdate'));
	/* Ubicacion CRUD (GET) */
	Route::get('/admin/ubicaciones', array(
		'as' => 'admin_ubicaciones', 'uses' => 'UbicacionController@getUbicaciones'));
	Route::get('/admin/ubicacion/create', array(
		'as' => 'admin_ubicacion_create', 'uses' => 'UbicacionController@getUbicacionCreate'));
	Route::get('/admin/ubicacion/update/{id}', array(
		'as' => 'admin_ubicacion_update', 'uses' => 'UbicacionController@getUbicacionUpdate'));
	/*
	| Grupo CSRF
	*/
	Route::group(array('before' => 'csrf'), function() {
		/* Libro: CRUD (POST) */
		Route::post('/libro/create', array(
			'as' => 'libro_create_post', 'uses' => 'LibroController@postLibroCreate'));
		Route::post('/libro/update/{id}', array(
			'as' => 'libro_update_post', 'uses' => 'LibroController@postLibroUpdate'));
		Route::post('/libro/delete', array(
			'as' => 'libro_delete_post', 'uses' => 'LibroController@postLibroDelete'));
		Route::post('/libro/recuperar', array(
			'as' => 'libro_recuperar_post', 'uses' => 'LibroController@postLibroRecuperar'));
		/* Periodico: CRUD (POST) */
		Route::post('/periodico/create', array(
			'as' => 'periodico_create_post', 'uses' => 'PeriodicoController@postPeriodicoCreate'));
		Route::post('/periodico/update/{id}', array(
			'as' => 'periodico_update_post', 'uses' => 'PeriodicoController@postPeriodicoUpdate'));
		Route::post('/periodico/delete', array(
			'as' => 'periodico_delete_post', 'uses' => 'PeriodicoController@postPeriodicoDelete'));
		Route::post('/periodico/recuperar', array(
			'as' => 'periodico_recuperar_post', 'uses' => 'PeriodicoController@postPeriodicoRecuperar'));
		/* Clasificacion CRUD (POST) */
		Route::post('/admin/clasificacion/create', array(
			'as' => 'admin_clasificacion_create_post', 'uses' => 'ClasificacionController@postClasificacionCreate'));
		Route::post('/admin/clasificacion/update/{id}', array(
			'as' => 'admin_clasificacion_update_post', 'uses' => 'ClasificacionController@postClasificacionUpdate'));
		/* Estado CRUD (POST) */
		Route::post('/admin/estado/create', array(
			'as' => 'admin_estado_create_post', 'uses' => 'EstadoController@postEstadoCreate'));
		Route::post('/admin/estado/update/{id}', array(
			'as' => 'admin_estado_update_post', 'uses' => 'EstadoController@postEstadoUpdate'));
		/* Tipo CRUD (POST) */
		Route::post('/admin/tipo/create', array(
			'as' => 'admin_tipo_create_post', 'uses' => 'TipoController@postTipoCreate'));
		Route::post('/admin/tipo/update/{id}', array(
			'as' => 'admin_tipo_update_post', 'uses' => 'TipoController@postTipoUpdate'));
		/* Ubicacion CRUD (POST) */
		Route::post('/admin/ubicacion/create', array(
			'as' => 'admin_ubicacion_create_post', 'uses' => 'UbicacionController@postUbicacionCreate'));
		Route::post('/admin/ubicacion/update/{id}', array(
			'as' => 'admin_ubicacion_update_post', 'uses' => 'UbicacionController@postUbicacionUpdate'));
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