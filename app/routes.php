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
		'as' => 'admin_biblioteca', 'uses' => 'LibroController@getAdminBiblioteca'));
	/* Libros no activados */
	Route::get('/biblioteca/no', array(
		'as' => 'admin_biblioteca_no', 'uses' => 'LibroController@getAdminBibliotecaNo'));
	/* Libro: datos en json */
	Route::get('/data/libro', array(
		'as' => 'admin_data_libro', 'uses' => 'LibroController@getAdminDataLibro'));
	/* Libro: crear */
	Route::get('/libro/create', array(
		'as' => 'admin_libro_create', 'uses' => 'LibroController@getAdminLibroCreate'));
	/* Libro: editar */
	Route::get('/libro/update/{id}', array(
		'as' => 'admin_libro_update', 'uses' => 'LibroController@getAdminLibroUpdate'));
	/* Libro: busqueda de libros activados */
	Route::get('/datatable/libros', array(
		'as' => 'admin_datatable_libros', 'uses' => 'LibroController@getAdminDatatableLibro'));
	/* Libro: busqueda de libros no activados */
	Route::get('/datatable/libros/no', array(
		'as' => 'admin_datatable_libros_no', 'uses' => 'LibroController@getAdminDatatableLibroNo'));
	/*
	| HEMEROTECA (GET) 
	*/
	/* Periodicos activados */
	Route::get('/hemeroteca', array(
		'as' => 'admin_hemeroteca', 'uses' => 'PeriodicoController@getAdminHemeroteca'));
	/* Periodicos no activados */
	Route::get('/hemeroteca/no', array(
		'as' => 'admin_hemeroteca_no', 'uses' => 'PeriodicoController@getAdminHemerotecaNo'));
	/* Periodico: datos en json */
	Route::get('/data/periodico', array(
		'as' => 'admin_data_periodico', 'uses' => 'PeriodicoController@getAdminDataPeriodico'));
	/* Periodico: crear */
	Route::get('/periodico/create', array(
		'as' => 'admin_periodico_create', 'uses' => 'PeriodicoController@getAdminPeriodicoCreate'));
	/* Periodicos: editar */
	Route::get('/periodico/update/{id}', array(
		'as' => 'admin_periodico_update', 'uses' => 'PeriodicoController@getAdminPeriodicoUpdate'));
	/* Periodico: busqueda de periodicos activados */
	Route::get('/datatable/periodicos', array(
		'as' => 'admin_datatable_periodicos', 'uses' => 'PeriodicoController@getAdminDatatablePeriodico'));
	/* Periodico: busqueda de periodicos no activados */
	Route::get('/datatable/periodicos/no', array(
		'as' => 'admin_datatable_periodicos_no', 'uses' => 'PeriodicoController@getAdminDatatablePeriodicoNo'));
	/*
	! PANEL (GET)
	*/
	/* Clasificacion CRUD (GET) */
	Route::get('/clasificaciones', array(
		'as' => 'admin_clasificaciones', 'uses' => 'ClasificacionController@getAdminClasificaciones'));
	Route::get('/clasificacion/create', array(
		'as' => 'admin_clasificacion_create', 'uses' => 'ClasificacionController@getAdminClasificacionCreate'));
	Route::get('/clasificacion/update/{id}', array(
		'as' => 'admin_clasificacion_update', 'uses' => 'ClasificacionController@getAdminClasificacionUpdate'));
	/* Estado CRUD (GET) */
	Route::get('/estados', array(
		'as' => 'admin_estados', 'uses' => 'EstadoController@getAdminEstados'));
	Route::get('/estado/create', array(
		'as' => 'admin_estado_create', 'uses' => 'EstadoController@getAdminEstadoCreate'));
	Route::get('/estado/update/{id}', array(
		'as' => 'admin_estado_update', 'uses' => 'EstadoController@getAdminEstadoUpdate'));
	/* Tipo CRUD (GET) */
	Route::get('/tipos', array(
		'as' => 'admin_tipos', 'uses' => 'TipoController@getAdminTipos'));
	Route::get('/tipo/create', array(
		'as' => 'admin_tipo_create', 'uses' => 'TipoController@getAdminTipoCreate'));
	Route::get('/tipo/update/{id}', array(
		'as' => 'admin_tipo_update', 'uses' => 'TipoController@getAdminTipoUpdate'));
	/* Ubicacion CRUD (GET) */
	Route::get('/ubicaciones', array(
		'as' => 'admin_ubicaciones', 'uses' => 'UbicacionController@getAdminUbicaciones'));
	Route::get('/ubicacion/create', array(
		'as' => 'admin_ubicacion_create', 'uses' => 'UbicacionController@getAdminUbicacionCreate'));
	Route::get('/ubicacion/update/{id}', array(
		'as' => 'admin_ubicacion_update', 'uses' => 'UbicacionController@getAdminUbicacionUpdate'));
	/*
	| ADMINISTRADOR (GET)
	*/
	/* Comentario CRUD (GET) */
	Route::get('/comentarios', array(
		'as' => 'admin_comentarios', 'uses' => 'ComentarioController@getAdminComentarios'));
	Route::get('/datatable/comentarios', array(
		'as' => 'admin_datatable_comentarios', 'uses' => 'ComentarioController@getAdminDatatableComentarios'));
	Route::get('/data/comentario', array(
		'as' => 'admin_data_comentario', 'uses' => 'ComentarioController@getAdminDataComentario'));
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
		'as' => 'admin_datatable_users', 'uses' => 'UserController@getDatatableUsers'));
	Route::get('/datatable/helpers/periodico', array(
		'as' => 'admin_datatable_helpers_periodico', 'uses' => 'UserController@getDatatableHelpersPeriodico'));
	Route::get('/datatable/helpers/libro', array(
		'as' => 'admin_datatable_helpers_libro', 'uses' => 'UserController@getDatatableHelpersLibro'));
	Route::get('/datatable/helpers', array(
		'as' => 'admin_datatable_helpers', 'uses' => 'UserController@getDatatableHelpers'));
	/* Asignar roles a usuarios */
	Route::get('/data/user', array(
		'as' => 'admin_data_user', 'uses' => 'UserController@getAdminDataUser'));
	Route::get('/user/asignar/group/{id}', array(
		'as' => 'admin_user_asignar_group', 'uses' => 'UserController@getAdminUserAsignarGroup'));
	/* Grupos */
	Route::get('/grupos', array(
		'as' => 'admin_groups', 'uses' => 'GroupController@getAdminGroups'));
	Route::get('/grupo/create', array(
		'as' => 'admin_group_create', 'uses' => 'GroupController@getAdminGroupCreate'));
	Route::get('/grupo/update/{id}', array(
		'as' => 'admin_group_update', 'uses' => 'GroupController@getAdminGroupUpdate'));
	/*
	| Grupo CSRF
	*/
	Route::group(array('before' => 'csrf'), function() {
		/* Libro: CRUD (POST) */
		Route::post('/libro/create', array(
			'as' => 'admin_libro_create_post', 'uses' => 'LibroController@postAdminLibroCreate'));
		Route::post('/libro/update/{id}', array(
			'as' => 'admin_libro_update_post', 'uses' => 'LibroController@postAdminLibroUpdate'));
		Route::post('/libro/delete', array(
			'as' => 'admin_libro_delete_post', 'uses' => 'LibroController@postAdminLibroDelete'));
		Route::post('/libro/recuperar', array(
			'as' => 'admin_libro_recuperar_post', 'uses' => 'LibroController@postAdminLibroRecuperar'));
		/* Periodico: CRUD (POST) */
		Route::post('/periodico/create', array(
			'as' => 'admin_periodico_create_post', 'uses' => 'PeriodicoController@postAdminPeriodicoCreate'));
		Route::post('/periodico/update/{id}', array(
			'as' => 'admin_periodico_update_post', 'uses' => 'PeriodicoController@postAdminPeriodicoUpdate'));
		Route::post('/periodico/delete', array(
			'as' => 'admin_periodico_delete_post', 'uses' => 'PeriodicoController@postAdminPeriodicoDelete'));
		Route::post('/periodico/recuperar', array(
			'as' => 'admin_periodico_recuperar_post', 'uses' => 'PeriodicoController@postAdminPeriodicoRecuperar'));
		/* Clasificacion CRUD (POST) */
		Route::post('/clasificacion/create', array(
			'as' => 'admin_clasificacion_create_post', 'uses' => 'ClasificacionController@postAdminClasificacionCreate'));
		Route::post('/clasificacion/update/{id}', array(
			'as' => 'admin_clasificacion_update_post', 'uses' => 'ClasificacionController@postAdminClasificacionUpdate'));
		/* Estado CRUD (POST) */
		Route::post('/estado/create', array(
			'as' => 'admin_estado_create_post', 'uses' => 'EstadoController@postAdminEstadoCreate'));
		Route::post('/estado/update/{id}', array(
			'as' => 'admin_estado_update_post', 'uses' => 'EstadoController@postAdminEstadoUpdate'));
		/* Tipo CRUD (POST) */
		Route::post('/tipo/create', array(
			'as' => 'admin_tipo_create_post', 'uses' => 'TipoController@postAdminTipoCreate'));
		Route::post('/tipo/update/{id}', array(
			'as' => 'admin_tipo_update_post', 'uses' => 'TipoController@postAdminTipoUpdate'));
		/* Ubicacion CRUD (POST) */
		Route::post('/ubicacion/create', array(
			'as' => 'admin_ubicacion_create_post', 'uses' => 'UbicacionController@postAdminUbicacionCreate'));
		Route::post('/ubicacion/update/{id}', array(
			'as' => 'admin_ubicacion_update_post', 'uses' => 'UbicacionController@postAdminUbicacionUpdate'));
		/* Comentario CRUD (POST) */
		Route::post('/comentario/answer', array(
			'as' => 'admin_comentario_answer_post', 'uses' => 'ComentarioController@postAdminComentarioAnswer'));
		/* Asignar roles al usuario (POST) */
		Route::post('/user/update/', array(
			'as' => 'admin_user_update_post', 'uses' => 'UserController@postAdminUserUpdate'));
		Route::post('/user/asignar/group/{id}', array(
			'as' => 'admin_user_asignar_group_post', 'uses' => 'UserController@postAdminUserAsignarGroup'));
		/* Grupo CRUD (POST) */
		Route::post('/grupo/create', array(
			'as' => 'admin_group_create_post', 'uses' => 'GroupController@postAdminGroupCreate'));
		Route::post('/grupo/update/{id}', array(
			'as' => 'admin_group_update_post', 'uses' => 'GroupController@postAdminGroupUpdate'));
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
		'as' => 'comentarios', 'uses' => 'ComentarioController@getUserComentarios'));
	Route::get('/comentario/create', array(
		'as' => 'comentario_create', 'uses' => 'ComentarioController@getUserComentarioCreate'));
	Route::get('/data/comentario', array(
		'as' => 'user_data_comentario', 'uses' => 'ComentarioController@getUserDataComentario'));
	/*
	| Grupo CSRF
	*/
	Route::group(array('before' => 'csrf'), function() {
		Route::post('/comentario/create', array(
			'as' => 'comentario_create_post', 'uses' => 'ComentarioController@postUserComentarioCreate'));
		Route::post('/comentario/update', array(
			'as' => 'comentario_update_post', 'uses' => 'ComentarioController@postUserComentarioUpdate'));
		Route::post('/comentario/delete', array(
			'as' => 'comentario_delete_post', 'uses' => 'ComentarioController@postUserComentarioDelete'));
		Route::post('/user/subscribirse', array(
			'as' => 'subscribirse_post', 'uses' => 'PageController@postSubscribirse'));
	});
});