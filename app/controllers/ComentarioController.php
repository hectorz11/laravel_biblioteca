<?php

class ComentarioController extends BaseController {

	public function getComentarios()
	{
		$sentry = Sentry::getUser();
		if ($sentry->hasAnyAccess(['comentario'])) {
			$user = User::find($sentry->id);
			return View::make('user.comentarios')->with('user', $user);
		} else {
			return Redirect::route('/');
		}
	}

	public function getComentarioCreate()
	{
		return View::make('user.comentario_create');
	}

	public function postComentarioCreate()
	{
		$respuesta = Comentario::createComentario(Input::all());
		if ($respuesta['error'] == true) {
			return Redirect::route('comentario_create')
			->withErrors($respuesta['mensaje'])->withInput()
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'warning']);
		} else {
			return Redirect::route('comentario_create')
			->with(['mensaje' => $respuesta['mensaje'], 'class' => 'success']);
		}
	}

	public function getComentariosAdmin()
	{
		return View::make('admin.comentario.comentarios');
	}

	public function getDatatableAdmin()
	{
		$result = DB::table('comentarios')
		->select(array(
			'comentarios.id',
			'comentarios.descripcion as descripcion',
			'users.last_name as last_name',
			'users.first_name as first_name',
			'comentarios.created_at as date'))
		->join('users', 'comentarios.user_id','=','users.id')
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
		if (Input::has('comentario'))
		{
			$comentario_id = Input::get('comentario');
	       	$comentario = Comentario::find($comentario_id);
	       	$user = $comentario->users;
	        $data = array(
	            'success' => true,// indica que se llevo la peticion acabo
	            'idComentario' => $comentario->id,
	            'email' => $user->email,
	            'first_name' => $user->first_name,
	            'last_name' => $user->last_name,
	            'comentario' => $comentario->descripcion,
	        );
	        return Response::json($data);
		}
	}

	public function postComentarioAnswer()
	{
		$data['email'] = Input::get('email');
		$data['comentario'] = Input::get('comentario');
		$data['respuesta'] = Input::get('respuesta');
		$email = Input::get('email');
		$user = Sentry::findUserByLogin($email);

		$comentario = Comentario::find(Input::get('idComentario'));
		$comentario->status = 0;
		$comentario->save();

		Mail::send('emails.admin.comentario_respuesta', $data, function($m) use ($data) {
			$m->to($data['email'])->subject('Gracias por comentar - Support Team ART');
		});

		return Redirect::route('admin_comentarios')
		->with('mensaje', 'Ha sido enviado la respuesta al usuario '.$user->first_name.' '.$user->last_name)
		->with('class', 'success');
	}
}