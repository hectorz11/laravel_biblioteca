<?php

class UserController extends BaseController {

	/* 
	|-----------------------------------------------------------------------------------------------------------
	| Lista de Usuario 
	|-----------------------------------------------------------------------------------------------------------
	*/
	public function getUsers()
	{
		if (Sentry::getUser()->hasAnyAccess(['usuario'])) {
			return View::make('admin.user.users');
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function getDatatableUsers()
	{
		$result = DB::table('users')
		->select(array(
			'users.id',
			'users.first_name as first_name',
			'users.last_name as last_name',
			'users.email as email',
			'users.created_at as fecha_inicio'))
		->join('users_groups', 'users.id','=','users_groups.user_id')
		->join('groups', 'users_groups.group_id','=','groups.id')
		->where('users.activated','=',true)
		->where('users_groups.group_id','=',5);

		return Datatable::query($result)
		->searchColumns('users.first_name','users.first_name')
		->orderColumns('id','users.last_name','users.first_name')
		->showColumns('id','first_name','last_name','email','fecha_inicio')
		->addColumn('Operaciones', function($model)
		{
			return "<a class='edit' href='#Edit' id=$model->id data-toggle='modal'>
						<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
					</a>
					<a href='".URL::route('admin_user_asignar_group', $model->id)."' id=$model->id data-toggle='modal'>
						<span class='label label-success'><i class='glyphicon glyphicon-edit'></i> Colaborador</span>
					</a>";
		})->make();
	}

	public function getAdminDataUser()
	{
		if (Input::has('user')) {
			$user = User::find(Input::get('user'));
			$data = array(
				'success' => true,
				'idUser' => $user->id,
				'first_name' => $user->first_name,
				'last_name' => $user->last_name,
				'email' => $user->email,
				'activated' => $user->activated,
			);
			return Response::json($data);
		}
	}
	/* 
	|-----------------------------------------------------------------------------------------------------------
	| Lista de Colaboradores a cargo de los Periodicos
	|-----------------------------------------------------------------------------------------------------------
	*/
	public function getHelpersPeriodico()
	{
		if (Sentry::getUser()->hasAnyAccess(['usuario'])) {
			return View::make('admin.user.helpers_periodico');
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function getDatatableHelpersPeriodico()
	{
		$result = DB::table('users')
		->select(array(
			'users.id',
			'users.first_name as first_name',
			'users.last_name as last_name',
			'users.email as email',
			'users.created_at as fecha_inicio'))
		->join('users_groups', 'users.id','=','users_groups.user_id')
		->join('groups', 'users_groups.group_id','=','groups.id')
		->where('users.activated','=',true)
		->where('users_groups.group_id','=',4);

		return Datatable::query($result)
		->searchColumns('users.first_name','users.first_name')
		->orderColumns('id','users.last_name','users.first_name')
		->showColumns('id','first_name','last_name','email','fecha_inicio')
		->addColumn('Operaciones', function($model)
		{
			return "<a class='edit' href='#Edit' id=$model->id data-toggle='modal'>
						<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
					</a>
					<a href='".URL::route('admin_user_asignar_group', $model->id)."' id=$model->id data-toggle='modal'>
						<span class='label label-success'><i class='glyphicon glyphicon-edit'></i> Colaborador</span>
					</a>";
		})->make();
	}
	/* 
	|-----------------------------------------------------------------------------------------------------------
	| Lista de Colaboradores a cargo de los Libros 
	|-----------------------------------------------------------------------------------------------------------
	*/
	public function getHelpersLibro()
	{
		if (Sentry::getUser()->hasAnyAccess(['usuario'])) {
			return View::make('admin.user.helpers_libro');
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function getDatatableHelpersLibro()
	{
		$result = DB::table('users')
		->select(array(
			'users.id',
			'users.first_name as first_name',
			'users.last_name as last_name',
			'users.email as email',
			'users.created_at as fecha_inicio'))
		->join('users_groups', 'users.id','=','users_groups.user_id')
		->join('groups', 'users_groups.group_id','=','groups.id')
		->where('users.activated','=',true)
		->where('users_groups.group_id','=',3);

		return Datatable::query($result)
		->searchColumns('users.first_name','users.first_name')
		->orderColumns('id','users.last_name','users.first_name')
		->showColumns('id','first_name','last_name','email','fecha_inicio')
		->addColumn('Operaciones', function($model)
		{
			return "<a class='edit' href='#Edit' id=$model->id data-toggle='modal'>
						<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
					</a>
					<a href='".URL::route('admin_user_asignar_group', $model->id)."' id=$model->id data-toggle='modal'>
						<span class='label label-success'><i class='glyphicon glyphicon-edit'></i> Colaborador</span>
					</a>";
		})->make();
	}
	/* 
	|-----------------------------------------------------------------------------------------------------------
	| Lista de Colaboradores Generales 
	|-----------------------------------------------------------------------------------------------------------
	*/
	public function getHelpers()
	{
		if (Sentry::getUser()->hasAnyAccess(['usuario'])) {
			return View::make('admin.user.helpers');
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function getDatatableHelpers()
	{
		$result = DB::table('users')
		->select(array(
			'users.id',
			'users.first_name as first_name',
			'users.last_name as last_name',
			'users.email as email',
			'users.created_at as fecha_inicio'))
		->join('users_groups', 'users.id','=','users_groups.user_id')
		->join('groups', 'users_groups.group_id','=','groups.id')
		->where('users.activated','=',true)
		->where('users_groups.group_id','=',2);

		return Datatable::query($result)
		->searchColumns('users.first_name','users.first_name')
		->orderColumns('id','users.last_name','users.first_name')
		->showColumns('id','first_name','last_name','email','fecha_inicio')
		->addColumn('Operaciones', function($model)
		{
			return "<a class='edit' href='#Edit' id=$model->id data-toggle='modal'>
						<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
					</a>
					<a href='".URL::route('admin_user_asignar_group', $model->id)."' id=$model->id data-toggle='modal'>
						<span class='label label-success'><i class='glyphicon glyphicon-edit'></i> Colaborador</span>
					</a>";
		})->make();
	}
	/*
	|-----------------------------------------------------------------------------------------------------------
	| Para asignar uno o varios grupos a un usuario en especifico
	|-----------------------------------------------------------------------------------------------------------
	*/
	public function postAdminUserUpdate()
	{
		$user = User::find(Input::get('idUser'));
		$rules = array(
			'email' => 'required|email|unique:users,email,'.$user->id,
		);
		$validation = Validator::make(Input::all(), $rules);
		if ($validation->fails()) {
			return Redirect::route('admin_user_asignar_group', $user->id)
			->withErrors($validation)->withInput();
		} else {
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			if (Input::get('activated') == true) $user->activated = 1;
			else $user->activated = 0;

			if ($user->save()) {
				return Redirect::route('admin_users')
				->with(['mensaje' => 'Datos actualizados del Usuario!', 'class' => 'success']);
			} else {
				return Redirect::route('admin_users')
				->with(['mensaje' => 'Error, team noob!', 'class' => 'danger']);
			}
		}
	}

	public function getAdminUserAsignarGroup($id)
	{
		$sentry = Sentry::getUser();
		if ($sentry->hasAnyAccess(['usuario_update'])) {
			$user = User::find($id);
			$groups = Sentry::findAllGroups();

			return View::make('admin.user.user_group')
			->with(['user' => $user, 'groups' => $groups]);
		} else {
			return Redirect::route('/');
		}
	}

	public function postAdminUserAsignarGroup($id)
	{
		$sentry = Sentry::findUserById($id);
		$groups_1 = Sentry::findAllGroups();
		$groups = Input::get('groups');

		foreach ($groups_1 as $group_1) {
			$sentry->groups()->detach($group_1);
		}
		if (isset($groups)) {
			foreach ($groups as $group) {
				$sentry->groups()->attach($group);
			}
		}
		return Redirect::route('admin_users')
		->with(['mensaje' => 'Fue un exito la operación!', 'class' => 'success']);
	}
	/*
	|-----------------------------------------------------------------------------------------------------------
	| Grupos
	|-----------------------------------------------------------------------------------------------------------
	*/
	public function getAdminGroups()
	{
		$sentry = Sentry::getUser();
		if ($sentry->hasAnyAccess(['grupo'])) {
			$groups = Sentry::findAllGroups();
			return View::make('admin.grupo.groups')
			->with('groups', $groups);
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
		/*$groups = Sentry::findAllGroups();
		foreach ($groups as $group) {
			$permissions[$group->id] = $group->getPermissions();
		}
		return $permissions;*/
	}

	public function getAdminGroupCreate()
	{
		if (Sentry::getUser()->hasAnyAccess(['grupo_create'])) {
			return View::make('admin.grupo.group_create');
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function postAdminGroupCreate()
	{
		try {
			$group = Sentry::createGroup(array(
				'name' => Input::get('name'),
				'permissions' => array(
					'admin' => Input::get('admin'),
					'grupo' => Input::get('grupo'),
					'grupo_create' => Input::get('grupo_create'),
					'grupo_update' => Input::get('grupo_update'),
					'grupo_delete' => Input::get('grupo_delete'),
					'usuario' => Input::get('usuario'),
					'usuario_create' => Input::get('usuario_create'),
					'usuario_update' => Input::get('usuario_update'),
					'usuario_delete' => Input::get('usuario_delete'),
					'libro' => Input::get('libro'),
					'libro_create' => Input::get('libro_create'),
					'libro_update' => Input::get('libro_update'),
					'libro_delete' => Input::get('libro_delete'),
					'periodico' => Input::get('periodico'),
					'periodico_create' => Input::get('periodico_create'),
					'periodico_update' => Input::get('periodico_update'),
					'periodico_delete' => Input::get('periodico_delete'),
					'clasificacion' => Input::get('clasificacion'),
					'clasificacion_create' => Input::get('clasificacion_create'),
					'clasificacion_update' => Input::get('clasificacion_update'),
					'clasificacion_delete' => Input::get('clasificacion_delete'),
					'estado' => Input::get('estado'),
					'estado_create' => Input::get('estado_create'),
					'estado_update' => Input::get('estado_update'),
					'estado_delete' => Input::get('estado_delete'),
					'tipo' => Input::get('tipo'),
					'tipo_create' => Input::get('tipo_create'),
					'tipo_update' => Input::get('tipo_update'),
					'tipo_delete' => Input::get('tipo_delete'),
					'ubicacion' => Input::get('ubicacion'),
					'ubicacion_create' => Input::get('ubicacion_create'),
					'ubicacion_update' => Input::get('ubicacion_update'),
					'ubicacion_delete' => Input::get('ubicacion_delete'),
					'comentario' => Input::get('comentario'),
					'comentario_create' => Input::get('comentario_create'),
					'comentario_update' => Input::get('comentario_update'),
					'comentario_delete' => Input::get('comentario_delete'),
				),
			));

			return Redirect::route('admin_group_create')
			->with(['mensaje' => 'Grupo creado con exito', 'class' => 'success']);
		} catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
			return Redirect::route('admin_group_create')
			->with(['mensaje' => 'Error, Revidar nombre', 'class' => 'danger']);
		} catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
			return Redirect::route('admin_group_create')
			->with(['mensaje' => 'Error, El grupo ya existe', 'class' => 'danger']);
		}
    }

	public function getAdminGroupUpdate($id)
	{
		if (Sentry::getUser()->hasAnyAccess(['grupo_update'])) {
			$group = Sentry::findGroupById($id);
			return View::make('admin.grupo.group_update')
			->with('group', $group);
		} else {
			return Redirect::route('/')
			->with(['mensaje' => 'No tiene acceso', 'class' => 'warning']);
		}
	}

	public function postAdminGroupUpdate($id)
	{
		$group = Sentry::findGroupById($id);
		$group->name = Input::get('name');
		if (Input::has('admin')) $group->permissions = array('admin' => 1);
		else $group->permissions = array('admin' => 0);
		$group->permissions = array(
			'grupo' => Input::get('grupo'),
			'grupo_create' => Input::get('grupo_create'),
			'grupo_update' => Input::get('grupo_update'),
			'grupo_delete' => Input::get('grupo_delete'),
			'usuario' => Input::get('usuario'),
			'usuario_create' => Input::get('usuario_create'),
			'usuario_update' => Input::get('usuario_update'),
			'usuario_delete' => Input::get('usuario_delete'),
			'libro' => Input::get('libro'),
			'libro_create' => Input::get('libro_create'),
			'libro_update' => Input::get('libro_update'),
			'libro_delete' => Input::get('libro_delete'),
			'periodico' => Input::get('periodico'),
			'periodico_create' => Input::get('periodico_create'),
			'periodico_update' => Input::get('periodico_update'),
			'periodico_delete' => Input::get('periodico_delete'),
			'clasificacion' => Input::get('clasificacion'),
			'clasificacion_create' => Input::get('clasificacion_create'),
			'clasificacion_update' => Input::get('clasificacion_update'),
			'clasificacion_delete' => Input::get('clasificacion_delete'),
			'estado' => Input::get('estado'),
			'estado_create' => Input::get('estado_create'),
			'estado_update' => Input::get('estado_update'),
			'estado_delete' => Input::get('estado_delete'),
			'tipo' => Input::get('tipo'),
			'tipo_create' => Input::get('tipo_create'),
			'tipo_update' => Input::get('tipo_update'),
			'tipo_delete' => Input::get('tipo_delete'),
			'ubicacion' => Input::get('ubicacion'),
			'ubicacion_create' => Input::get('ubicacion_create'),
			'ubicacion_update' => Input::get('ubicacion_update'),
			'ubicacion_delete' => Input::get('ubicacion_delete'),
			'comentario' => Input::get('comentario'),
			'comentario_create' => Input::get('comentario_create'),
			'comentario_update' => Input::get('comentario_update'),
			'comentario_delete' => Input::get('comentario_delete'),
		);
		$group->save();

		return $group;
	}
}