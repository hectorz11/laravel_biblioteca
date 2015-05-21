@extends('base')

@section('contenido')
<br><br><br><br>
<div class="container">
{{ Form::open(array('route' => array('libro_update_post', $libro->id), 'files' => true)) }}
  @if(Session::get('mensaje'))
    <div class="alert alert-success">{{Session::get('mensaje')}}</div>
  @endif
  	<div class="row">
  		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Codigo:</label></div>
  		<div class="col-md-4 col-xs-6 col-sm-4">{{ Form::text('codigo', $libro->codigo, ['class' => 'form-control']) }}</div>
  	</div><br>
  	<div class="row">
  		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Autores:</label></div>
  		<div class="col-md-6 col-xs-9 col-sm-2">{{ Form::text('autores', $libro->autores, ['class' => 'form-control']) }}</div>
  	</div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Titulo:</label></div>
      <div class="col-md-6 col-xs-9 col-sm-6">{{ Form::text('titulo', $libro->titulo, ['class' => 'form-control']) }}</div>
    </div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Edicion:</label></div>
      <div class="col-md-3 col-xs-9 col-sm-3">{{ Form::text('edicion', $libro->edicion, ['class' => 'form-control']) }}</div>
    </div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Anio:</label></div>
      <div class="col-md-3 col-xs-9 col-sm-3">{{ Form::text('anio', $libro->anio, ['class' => 'form-control']) }}</div>
    </div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Contenido:</label></div>
      <div class="col-md-8">{{ Form::text('contenido', $libro->contenido, ['class' => 'form-control']) }}</div>
    </div><br>
  	<div class="row">
  		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Foto:</label></div>
  		<div class="col-md-4 col-xs-6 col-sm-4">{{ Form::file('foto') }}</div>
  	</div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Ubicacion:</label></div>
      <div class="col-md-3 col-xs-9 col-sm-3">
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
    </div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Estado:</label></div>
        <div class="col-md-3 col-xs-9 col-sm-3">
        <select name="estado_id" class="form-control">
          <option value="{{ $libro->estados->id }}">{{ $libro->estados->nombre }}</option>
          <option>------------------------------</option>
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
      <div class="col-md-3 col-xs-9 col-sm-3">
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
    </div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Descripcion:</label></div>
      <div class="col-md-8">{{ Form::text('descripcion', $libro->descripcion, ['class' => 'form-control']) }}</div>
    </div><br>
    <div class="row">
      <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Observaciones:</label></div>
      <div class="col-md-8">{{ Form::text('observaciones', $libro->observaciones, ['class' => 'form-control']) }}</div>
    </div><br>
  <input class="btn btn-large btn-primary" type="submit" value="Confirmar" />
  <a href="{{ URL::route('biblioteca') }}" class="btn btn-large btn-danger">Cancelar</a>
  {{ Form::close() }}
</div>
@stop