@extends('base')

@section('contenido')
<div class="container">
  <div class="col-md-8">
    @if(Session::has('mensaje'))
      <div class="alert alert-{{ Session::get('class') }}">
        <strong>{{ Session::get('mensaje') }}</strong>
        <button type="button" class="close" data-dismiss="alert">×</button>
      </div>
    @endif
      <h3>Modifique el Libro</h3>
    {{ Form::open(array('route' => array('libro_update_post', $libro->id), 'files' => true)) }}
    	<div class="row">
    		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label">Codigo:</label></div>
    		<div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('codigo', $libro->codigo, ['class' => 'form-control']) }}</div>
    	</div>
      @if( $errors->has('codigo') )
        <div class="alert alert-danger">
          @foreach($errors->get('codigo') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
    	<div class="row">
    		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label">Autores:</label></div>
    		<div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('autores', $libro->autores, ['class' => 'form-control']) }}</div>
    	</div>
      @if( $errors->has('autores') )
        <div class="alert alert-danger">
          @foreach($errors->get('autores') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label">Titulo:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('titulo', $libro->titulo, ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label">Edicion:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('edicion', $libro->edicion, ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label">Anio:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('anio', $libro->anio, ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label">Contenido:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('contenido', $libro->contenido, ['class' => 'form-control']) }}</div>
      </div><br>
    	<div class="row">
    		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label">Foto:</label></div>
    		<div class="col-md-10 col-xs-15 col-sm-10">{{ Form::file('foto') }}</div>
    	</div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label">Casificacion:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">
          <select name="clasificacion_id" class="form-control">
            <option value="{{ $libro->clasificaciones->id }}">{{ $libro->clasificaciones->nombre }}</option>
            <option>------------------------------</option>
            @if(isset($clasificacion))
              @foreach($clasificacion as $c)
              <option value="{{ $c->id }}">{{ $c->nombre }}</option>
              @endforeach
            @endif
          </select>
        </div>
      </div>
      @if( $errors->has('clasificacion_id') )
        <div class="alert alert-danger">
          @foreach($errors->get('clasificacion_id') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label">Estado:</label></div>
          <div class="col-md-10 col-xs-15 col-sm-10">
          <select id="estado_id" class="form-control">
            <option value="{{ $libro->estados->id }}">{{ $libro->estados->nombre }}</option>
            <option>------------------------------</option>
            @if(isset($estado))
              @foreach($estado as $e)
              <option value="{{ $e->id }}">{{ $e->nombre }}</option>
              @endforeach
            @endif
          </select>
        </div>
      </div>
      @if( $errors->has('estado_id') )
        <div class="alert alert-danger">
          @foreach($errors->get('estado_id') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label">Ubicacion:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">
          <select name="ubicacion_id" class="form-control">
            <option value="{{ $libro->ubicaciones->id }}">{{ $libro->ubicaciones->nombre }}</option>
            <option>------------------------------</option>
            @if(isset($ubicacion))
              @foreach($ubicacion as $u)
              <option value="{{ $u->id }}">{{ $u->nombre }}</option>
              @endforeach
            @endif
          </select>
        </div>
      </div>
      @if( $errors->has('ubicacion_id') )
        <div class="alert alert-danger">
          @foreach($errors->get('ubicacion_id') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label">Descripcion:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('descripcion', $libro->descripcion, ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label">Observaciones:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('observaciones', $libro->observaciones, ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="form-actions" align="center">
        <button type="submit" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Confirmar</button>
        <a href="{{ URL::route('biblioteca') }}" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</a>
      </div>
    {{ Form::close() }}
  </div>
  <!-- Start Sidebar -->
  <div class="col-md-4">
      <h3>Bienvenido</h3>
        {{ $user->first_name}} {{ $user->last_name }}
      <br>
      <h3>Archivo Regional Tacna</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>Libro</th>
          </tr>
        </thead>
        <tbody>
        @foreach($libros as $libro2)
        <tr>
          <td><span class="badge">{{ $libro2->created_at }}</span></td>
          <td><a href="{{ URL::route('libro_update', $libro2->id) }}">{{ $libro2->titulo }}</a></td>
        </tr>
        @endforeach
        </tbody>
      </table>
  </div>
</div>
@stop