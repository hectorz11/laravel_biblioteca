@extends('base')

@section('contenido')

@if(!Sentry::check())
<div class="jumbotron">
	<div class="container">
		<div class="col-md-8">
	    	<h1>Archivo Regional Tacna, Catálogo de Material Bibliográfico </h1>  
		</div>
		<div class="col-md-4">
			{{ Form::open(array('route' => 'register_post')) }}
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  {{ Form::text('first_name', Input::old('first_name'), ['class' => 'form-control', 'placeholder' => 'Nombre(s)']) }}
        </div>
        @if( $errors->has('first_name') )
          <div class="alert alert-danger">
          @foreach($errors->get('first_name') as $error)
            * {{$error}}</br>
          @endforeach
          </div>
        @endif<br>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          {{ Form::text('last_name', Input::old('last_name'), ['class' => 'form-control', 'placeholder' => 'Apellidos']) }}
        </div>
        @if( $errors->has('last_name') )
          <div class="alert alert-danger">
          @foreach($errors->get('last_name') as $error)
            * {{$error}}</br>
          @endforeach
          </div>
        @endif<br>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				  {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'example@example.com']) }}
        </div>
        @if( $errors->has('email') )
          <div class="alert alert-danger">
          @foreach($errors->get('email') as $error)
            * {{$error}}</br>
          @endforeach
          </div>
        @endif<br>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				  <input type="password" name="password" class="form-control" placeholder="Create a password">
        </div>
        @if( $errors->has('password') )
          <div class="alert alert-danger">
          @foreach($errors->get('password') as $error)
            * {{$error}}</br>
          @endforeach
          </div>
        @endif<br>
        {{ Form::hidden('tipo', 'user') }}<br>
        <button class="btn btn-success btn-lg" type="submit">Registrate</button>
      {{ Form::close() }}
			</form>
	 	</div>
  </div>
</div>
@else
<div class="jumbotron">
  <div class="container">
    <div class="col-md-8">
        <h1>Archivo Regional Tacna, Catálogo de Material Bibliográfico </h1>
      @if(Session::has('mensaje'))
        <div class="alert alert-{{ Session::get('class') }}">
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-lg">{{ Session::get('mensaje') }}</button>
          <button type="button" class="close" data-dismiss="alert">×</button>
        </div>
      @endif
    </div>
    <div class="col-md-4">
      {{ Form::open(array('route' => array('usuario_update_post', $user->id))) }}
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-pawn"></i></span>
          {{ Form::text('first_name', $user->first_name, ['class' => 'form-control', 'placeholder' => 'Nombre(s)']) }}
        </div>
        @if( $errors->has('first_name') )
          <div class="alert alert-danger">
          @foreach($errors->get('first_name') as $error)
            * {{$error}}</br>
          @endforeach
          </div>
        @endif<br>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-bishop"></i></span>
          {{ Form::text('last_name', $user->last_name, ['class' => 'form-control', 'placeholder' => 'Apellidos']) }}
        </div>
        @if( $errors->has('last_name') )
          <div class="alert alert-danger">
          @foreach($errors->get('last_name') as $error)
            * {{$error}}</br>
          @endforeach
          </div>
        @endif<br>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
          {{ Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@example.com']) }}
        </div>
        @if( $errors->has('email') )
          <div class="alert alert-danger">
          @foreach($errors->get('email') as $error)
            * {{$error}}</br>
          @endforeach
          </div>
        @endif<br>
        <button class="btn btn-success btn-lg" type="submit">Editar Perfil</button>
      {{ Form::close() }}
      </form>
    </div>
  </div>
</div>
@endif

<!-- Modal Eliminar-->
<div class="modal fade bs-example-modal-lg"tabindex="-1" role="dialog" Saria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle"></i> No cuenta con acceso</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <span>No cuenta con acceso a este módulo de la aplicación, para mas información comuniquese
              con el administrador para asignarle estos permisos</span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end mi modal eliminar-->

<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="/imagenes/imagen1.jpg" alt="Generic placeholder image" width="140" height="140">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="img-circle" src="/imagenes/imagen2.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="img-circle" src="/imagenes/imagen3.jpg" alt="Generic placeholder image" width="140" height="140">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>
@stop