<?php

class UserController extends BaseController {

	public function getUsers()
	{
		if (Sentry::check()) {
			return View::make('admin.user.users');
		} else {
			return Redirect::route('/');
		}
	}

	public function getDatatableUser()
	{
		$result = DB::table('users')
		->select(array(
			'users.id',
			'users.first_name as first_name',
			'users.last_name as last_name',
			'users.email as email',
			'users.created_at as fecha_inicio',
			'groups.name as group'))
		->join('users_groups', 'users.id','=','users_groups.user_id')
		->join('groups', 'users_groups.group_id','=','groups.id')
		->where('users.activated','=',true);

		return Datatable::query($result)
		->searchColumns('users.first_name','users.first_name','groups.name')
		->orderColumns('id','users.last_name','users.first_name')
		->showColumns('id','first_name','last_name','email','group','fecha_inicio')
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