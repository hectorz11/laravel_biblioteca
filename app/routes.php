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
Route::get('/biblioteca', array(
	'as' => 'libro_search', 'uses' => 'LibroController@getLibroSearch'));
Route::get('/datatable/libros', array(
	'as' => 'datatable-libros', 'uses' => 'LibroController@getDatatableGuest'));
/*
| Hemeroteca (GET)
*/
/* Busqueda de Periodicos (GET) */
Route::get('/hemeroteca', array(
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

	Route::get('/registro/{userId}/activacion/{activationCode}', array(
		'as' => 'registro_activated', 'uses' => 'AccountController@getRegistroActivated'));
	
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
Route::group(array('prefix' => '/admin', 'before' => 'admin:admin'), function() {
	/*
	| BIBLIOTECA (GET)
	*/
	/* Libros activados */
	Route::get('/biblioteca', array(
		'as' => 'biblioteca', 'uses' => 'LibroController@getBiblioteca'));
	/* Libros no activados */
	Route::get('/biblioteca/no', array(
		'as' => 'biblioteca_no', 'uses' => 'LibroController@getBibliotecaNo'));
	/* Libro: datos en json */
	Route::get('/data/libro', array(
		'as' => 'data-libro', 'uses' => 'LibroController@getDataLibro'));
	/* Libro: crear */
	Route::get('/libro/create', array(
		'as' => 'libro_create', 'uses' => 'LibroController@getLibroCreate'));
	/* Libro: editar */
	Route::get('/libro/update/{id}', array(
		'as' => 'libro_update', 'uses' => 'LibroController@getLibroUpdate'));
	/* Libro: busqueda de libros activados */
	Route::get('/datatable/libros', array(
		'as' => 'admin-datatable-libros', 'uses' => 'LibroController@getDatatableAdmin'));
	/* Libro: busqueda de libros no activados */
	Route::get('/datatable/libros/no', array(
		'as' => 'admin-datatable-libros-no', 'uses' => 'LibroController@getDatatableAdminNo'));
	/*
	| HEMEROTECA (GET) 
	*/
	/* Periodicos activados */
	Route::get('/hemeroteca', array(
		'as' => 'hemeroteca', 'uses' => 'PeriodicoController@getHemeroteca'));
	/* Periodicos no activados */
	Route::get('/hemeroteca/no', array(
		'as' => 'hemeroteca_no', 'uses' => 'PeriodicoController@getHemerotecaNo'));
	/* Periodico: datos en json */
	Route::get('/data/periodico', array(
		'as' => 'data-periodico', 'uses' => 'PeriodicoController@getDataPeriodico'));
	/* Periodico: crear */
	Route::get('/periodico/create', array(
		'as' => 'periodico_create', 'uses' => 'PeriodicoController@getPeriodicoCreate'));
	/* Periodicos: editar */
	Route::get('/periodico/update/{id}', array(
		'as' => 'periodico_update', 'uses' => 'PeriodicoController@getPeriodicoUpdate'));
	/* Periodico: busqueda de periodicos activados */
	Route::get('/datatable/periodicos', array(
		'as' => 'admin-datatable-periodicos', 'uses' => 'PeriodicoController@getDatatableAdmin'));
	/* Periodico: busqueda de periodicos no activados */
	Route::get('/datatable/periodicos/no', array(
		'as' => 'admin-datatable-periodicos-no', 'uses' => 'PeriodicoController@getDatatableAdminNo'));
	/*
	! PANEL (GET)
	*/
	/* Clasificacion CRUD (GET) */
	Route::get('/clasificaciones', array(
		'as' => 'admin_clasificaciones', 'uses' => 'ClasificacionController@getClasificaciones'));
	Route::get('/clasificacion/create', array(
		'as' => 'admin_clasificacion_create', 'uses' => 'ClasificacionController@getClasificacionCreate'));
	Route::get('/clasificacion/update/{id}', array(
		'as' => 'admin_clasificacion_update', 'uses' => 'ClasificacionController@getClasificacionUpdate'));
	/* Estado CRUD (GET) */
	Route::get('/estados', array(
		'as' => 'admin_estados', 'uses' => 'EstadoController@getEstados'));
	Route::get('/estado/create', array(
		'as' => 'admin_estado_create', 'uses' => 'EstadoController@getEstadoCreate'));
	Route::get('/estado/update/{id}', array(
		'as' => 'admin_estado_update', 'uses' => 'EstadoController@getEstadoUpdate'));
	/* Tipo CRUD (GET) */
	Route::get('/tipos', array(
		'as' => 'admin_tipos', 'uses' => 'TipoController@getTipos'));
	Route::get('/tipo/create', array(
		'as' => 'admin_tipo_create', 'uses' => 'TipoController@getTipoCreate'));
	Route::get('/tipo/update/{id}', array(
		'as' => 'admin_tipo_update', 'uses' => 'TipoController@getTipoUpdate'));
	/* Ubicacion CRUD (GET) */
	Route::get('/ubicaciones', array(
		'as' => 'admin_ubicaciones', 'uses' => 'UbicacionController@getUbicaciones'));
	Route::get('/ubicacion/create', array(
		'as' => 'admin_ubicacion_create', 'uses' => 'UbicacionController@getUbicacionCreate'));
	Route::get('/ubicacion/update/{id}', array(
		'as' => 'admin_ubicacion_update', 'uses' => 'UbicacionController@getUbicacionUpdate'));
	/*
	| ADMINISTRADOR (GET)
	*/
	/* Comentario CRUD (GET) */
	Route::get('/comentarios', array(
		'as' => 'admin_comentarios', 'uses' => 'ComentarioController@getComentariosAdmin'));
	Route::get('/datatable/comentarios', array(
		'as' => 'admin-datatable-comentarios', 'uses' => 'ComentarioController@getDatatableAdmin'));
	Route::get('/data/comentario', array(
		'as' => 'data-comentario', 'uses' => 'ComentarioController@getDataComentario'));
	/* User (GET) */
	Route::get('/users', array(
		'as' => 'admin_users', 'uses' => 'UserController@getUsers'));
	Route::get('/helpers/periodico', array(
		'as' => 'admin_helpers_periodico', 'uses' => 'UserController@getHelpersPeriodico'));
	Route::get('/helpers/libro', array(
		'as' => 'admin_helpers_libro', 'uses' => 'UserController@getHelpersLibro'));
	Route::get('/helpers', array(
		'as' => 'admin_helpers', 'uses' => 'UserController@getHelpers'));
	/* Datatable (GET) */
	Route::get('/datatable/users', array(
		'as' => 'admin-datatable-users', 'uses' => 'UserController@getDatatableUsers'));
	Route::get('/datatable/helpers/periodico', array(
		'as' => 'admin-datatable-helpers-periodico', 'uses' => 'UserController@getDatatableHelpersPeriodico'));
	Route::get('/datatable/helpers/libro', array(
		'as' => 'admin-datatable-helpers-libro', 'uses' => 'UserController@getDatatableHelpersLibro'));
	Route::get('/datatable/helpers', array(
		'as' => 'admin-datatable-helpers', 'uses' => 'UserController@getDatatableHelpers'));
	/* Asignar roles a usuarios */
	Route::get('/data/user', array(
		'as' => 'data-user', 'uses' => 'UserController@getAdminDataUser'));
	Route::get('/user/asignar/group/{id}', array(
		'as' => 'admin_user_asignar_group', 'uses' => 'UserController@getAdminUserAsignarGroup'));
	/* Grupos */
	Route::get('/grupos', array(
		'as' => 'admin_groups', 'uses' => 'UserController@getAdminGroups'));
	Route::get('/grupo/{id}', array(
		'as' => 'admin_group_update', 'uses' => 'UserController@getAdminGroupUpdate'));
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
		Route::post('/clasificacion/create', array(
			'as' => 'admin_clasificacion_create_post', 'uses' => 'ClasificacionController@postClasificacionCreate'));
		Route::post('/clasificacion/update/{id}', array(
			'as' => 'admin_clasificacion_update_post', 'uses' => 'ClasificacionController@postClasificacionUpdate'));
		/* Estado CRUD (POST) */
		Route::post('/estado/create', array(
			'as' => 'admin_estado_create_post', 'uses' => 'EstadoController@postEstadoCreate'));
		Route::post('/estado/update/{id}', array(
			'as' => 'admin_estado_update_post', 'uses' => 'EstadoController@postEstadoUpdate'));
		/* Tipo CRUD (POST) */
		Route::post('/tipo/create', array(
			'as' => 'admin_tipo_create_post', 'uses' => 'TipoController@postTipoCreate'));
		Route::post('/tipo/update/{id}', array(
			'as' => 'admin_tipo_update_post', 'uses' => 'TipoController@postTipoUpdate'));
		/* Ubicacion CRUD (POST) */
		Route::post('/ubicacion/create', array(
			'as' => 'admin_ubicacion_create_post', 'uses' => 'UbicacionController@postUbicacionCreate'));
		Route::post('/ubicacion/update/{id}', array(
			'as' => 'admin_ubicacion_update_post', 'uses' => 'UbicacionController@postUbicacionUpdate'));
		/* Comentario CRUD (POST) */
		Route::post('/comentario/answer', array(
			'as' => 'admin_comentario_answer_post', 'uses' => 'ComentarioController@postComentarioAnswer'));
		/* Asignar roles al usuario (POST) */
		Route::post('/user/update/', array(
			'as' => 'admin_user_update_post', 'uses' => 'UserController@postAdminUserUpdate'));
		Route::post('/user/asignar/group/{id}', array(
			'as' => 'admin_user_asignar_group_post', 'uses' => 'UserController@postAdminUserAsignarGroup'));
		/* Grupo CRUD (POST) */
		Route::post('/grupo/update/{id}', array(
			'as' => 'admin_group_update_post', 'uses' => 'UserController@postAdminGroupUpdate'));
	});
});
/*------------------------------------------------------------------------------------------------*/
/*
| Usuario
*/
Route::group(array('prefix' => '/user', 'before' => 'user:user'), function() {
	Route::get('/libro/view', array(
		'as' => 'libro_view', 'uses' => 'LibroController@getLibroView'));
	Route::get('/periodico/views', array(
		'as' => 'periodico_view', 'uses' => 'PeriodicoController@getPeriodicoView'));
	Route::get('/comentarios', array(
		'as' => 'comentarios', 'uses' => 'ComentarioController@getComentarios'));
	Route::get('/comentario/create', array(
		'as' => 'comentario_create', 'uses' => 'ComentarioController@getComentarioCreate'));
	/*
	| Grupo CSRF
	*/
	Route::group(array('before' => 'csrf'), function() {
		Route::post('/comentario/create', array(
			'as' => 'comentario_create_post', 'uses' => 'ComentarioController@postComentarioCreate'));
		Route::post('/user/subscribirse', array(
			'as' => 'subscribirse_post', 'uses' => 'PageController@postSubscribirse'));
	});
});