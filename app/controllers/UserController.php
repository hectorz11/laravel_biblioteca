<?php

class UserController extends BaseController {

	/* 
	| Lista de Usuario 
	*/
	public function getUsers()
	{
		if (Sentry::getUser()->hasAnyAccess(['admin', 'helper'])) {
			return View::make('admin.user.users');
		} else {
			return Redirect::route('/');
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
					<a class='helper' href='#Helper' id=$model->id data-toggle='modal'>
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
			$ez = $user->id;
			return Response::json($data, $ez);
		}
	}
	/* 
	| Lista de Colaboradores a cargo de los Periodicos
	*/
	public function getHelpersPeriodico()
	{
		if (Sentry::getUser()->hasAnyAccess(['admin', 'helper'])) {
			return View::make('admin.user.helpers_periodico');
		} else {
			return Redirect::route('/');
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
			return "<a href='#' id=$model->id data-toggle='modal'>
						<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
					</a>
					<a class='edit' href='#' id=$model->id data-toggle='modal'>
						<span class='label label-danger'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</span>
					</a>";
		})->make();
	}
	/* 
	| Lista de Colaboradores a cargo de los Libros */
	public function getHelpersLibro()
	{
		if (Sentry::getUser()->hasAnyAccess(['admin', 'helper'])) {
			return View::make('admin.user.helpers_libro');
		} else {
			return Redirect::route('/');
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
			return "<a href='#' id=$model->id data-toggle='modal'>
						<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
					</a>
					<a class='edit' href='#' id=$model->id data-toggle='modal'>
						<span class='label label-danger'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</span>
					</a>";
		})->make();
	}
	/* 
	| Lista de Colaboradores Generales 
	*/
	public function getHelpers()
	{
		if (Sentry::getUser()->hasAnyAccess(['admin'])) {
			return View::make('admin.user.helpers');
		} else {
			return Redirect::route('/');
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
			return "<a href='#' id=$model->id data-toggle='modal'>
						<span class='label label-info'><i class='glyphicon glyphicon-edit'></i> Editar</span>
					</a>
					<a class='edit' href='#' id=$model->id data-toggle='modal'>
						<span class='label label-danger'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</span>
					</a>";
		})->make();
	}
}