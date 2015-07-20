<?php

class GroupController extends BaseController {

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
			->with(['mensaje' => 'El nombre es requerido', 'class' => 'warning']);
		} catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
			return Redirect::route('admin_group_create')
			->with(['mensaje' => 'El grupo ya existe', 'class' => 'warning']);
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
		try {
			$group = Sentry::findGroupById($id);
			$group->name = Input::get('name');
			$group->permissions = array(
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
			);
			$group->save();
			return Redirect::route('admin_group_update', $id)
			->with(['mensaje' => 'El grupo fue actualizado con exito!', 'class' => 'success']);

		} catch (Cartalyst\Sentry\Groups\NameRequiredException $e) {
			return Redirect::route('admin_group_update', $id)
			->with(['mensaje' => 'El nombre es requerido', 'class' => 'warning']);
		} catch (Cartalyst\Sentry\Groups\GroupExistsException $e) {
			return Redirect::route('admin_group_update', $id)
			->with(['mensaje' => 'El grupo ya existe', 'class' => 'warning']);
		} catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e) {
			return Redirect::route('admin_group_update', $id)
			->with(['mensaje' => 'El grupo no fue encontrado.', 'class' => 'danger']);
		}
	}
}