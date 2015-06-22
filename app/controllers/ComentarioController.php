<?php

class ComentarioController extends BaseController {

	public function getComentarios()
	{
		if (Sentry::check()) {
			$sentry = Sentry::getUser();
			$user = User::find($sentry->id);
			return View::make('user.comentarios')->with('user', $user);
		} else {
			return Redirect::route('/');
		}
	}

	public function getComentarioCreate()
	{
		if (Sentry::check()) {
			return View::make('user.comentario_create');
		} else {
			return Redirect::route('/');
		}
	}

	public function postComentarioCreate()
	{
		if (Sentry::check()) {
			$respuesta = Comentario::createComentario(Input::all());
			if ($respuesta['error'] == true) {
				return Redirect::route('comentario_create')
				->withErrors($respuesta['mensaje'])->withInput()
				->with(['mensaje' => $respuesta['mensaje'], 'class' => 'warning']);
			} else {
				return Redirect::route('comentario_create')
				->with(['mensaje' => $respuesta['mensaje'], 'class' => 'success']);
			}
		} else {
			return Redirect::route('/');
		}
	}

	public function getComentariosAdmin()
	{
		if (Sentry::check()) {
			return View::make('admin.comentario.comentarios');
		} else {
			return Redirect::route('/');
		}
	}

	public function getDatatableAdmin()
	{
		$result = DB::table('users')
		->select(array(
			'users.id',
			'comentarios.descripcion as descripcion',
			'users.last_name as last_name',
			'users.first_name as first_name',
			'comentarios.created_at as date'))
		->join('comentarios', 'comentarios.user_id','=','users.id')
		->where('comentarios.status','=',1);

		return Datatable::query($result)
		->searchColumns('users.last_name','users.first_name')
		->orderColumns('date','users.last_name','users.first_name')
		->showColumns('id','descripcion','last_name','first_name','date')
		->addColumn('Operaciones', function($model)
		{
			return "<a class='edit' href='".URL::to('#Responder')."' id=$model->id data-toggle='modal'>
        				<span class='label label-success'><i class='glyphicon glyphicon-envelope'></i> Responder</span>
        			</a>";
		})->make();
	}

	public function getDataComentario()
	{
		if (Input::has('user'))
		{
			$user_id = Input::get('user');
	       	$user = User::find($user_id);
	        $data = array(
	            'success' => true,// indica que se llevo la peticion acabo
	            'idUser' => $user->id,
	            'email' => $user->email
	        );
	        return Response::json($data);
		}
	}
}