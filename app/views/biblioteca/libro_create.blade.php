@extends('base')

@section('contenido')
<br><br><br><br>
<div class="container">
	{{ Form::open(array('route' => 'libro_create_post', 'method' => 'POST',
						          'accept-charset' => 'UTF-8', 'enctype' => 'multipart/form-data')) }}
  @if(Session::get('mensaje'))
    <div class="alert alert-success">{{Session::get('mensaje')}}</div>
  @endif
  <div class="row">
  	<div class="row">
  		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Codigo:</label></div>
  		<div class="col-md-4 col-xs-6 col-sm-4">{{ Form::text('codigo', Input::old('codigo'), ['class' => 'form-control']) }}</div>
  	</div><br>
  	<div class="row">
  		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Autores:</label></div>
  		<div class="col-md-6 col-xs-9 col-sm-6">{{ Form::text('autores', Input::old('autores'), ['class' => 'form-control']) }}</div>
  	</div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Titulo:</label></div>
      <div class="col-md-6 col-xs-9 col-sm-5">{{ Form::text('titulo', Input::old('titulo'), ['class' => 'form-control']) }}</div>
    </div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Edicion:</label></div>
      <div class="col-md-3 col-xs-4 col-sm-3">{{ Form::text('edicion', Input::old('edicion'), ['class' => 'form-control']) }}</div>
    </div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Anio:</label></div>
      <div class="col-md-3 col-xs-4 col-sm-3">{{ Form::text('anio', Input::old('anio'), ['class' => 'form-control']) }}</div>
    </div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Contenido:</label></div>
      <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('contenido', Input::old('contenido'), ['class' => 'form-control']) }}</div>
    </div><br>
  	<div class="row">
  		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Foto:</label></div>
  		<div class="col-md-4 col-xs-6 col-sm-4">{{ Form::file('foto', ['class' => 'form-control']) }}</div>
  	</div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Ubicacion:</label></div>
      <div class="col-md-3 col-xs-4 col-sm-3">
        <select id="ubicacion_id" class="form-control">
          <option>-- Ubicaciones --</option>
          @if(isset($ubicacion))
            @foreach($ubicacion as $u)
            <option value="{{ $u->id }}">{{ $u->nombre }}</option>
            @endforeach
          @endif
        </select>
      </div>
    </div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Estado:</label></div>
      <div class="col-md-3 col-xs-4 col-sm-3">
        <select name="estado_id" class="form-control">
          <option>-- Estados --</option>
          @if(isset($estado))
            @foreach($estado as $e)
            <option value="{{ $e->id }}">{{ $e->nombre }}</option>
            @endforeach
          @endif
        </select>
      </div>
    </div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Clasificacion:</label></div>
      <div class="col-md-3 col-xs-4 col-sm-3">
        <select id="clasificacion_id" class="form-control">
          <option>-- Clasificaciones --</option>
          @if(isset($clasificacion))
            @foreach($clasificacion as $c)
            <option value="{{ $c->id }}">{{ $c->nombre }}</option>
            @endforeach
          @endif
        </select>
      </div>
    </div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Descripcion:</label></div>
      <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('descripcion', Input::old('descripcion'), ['class' => 'form-control']) }}</div>
    </div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Observaciones:</label></div>
      <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('observaciones', Input::old('observaciones'), ['class' => 'form-control']) }}</div>
    </div>
  </div><br>
  <input class="btn btn-large btn-primary" type="submit" value="Confirmar" />
  <a href="{{ URL::route('/') }}" class="btn btn-large btn-danger">Cancelar</a>
  {{ Form::close() }}
</div>
@stop