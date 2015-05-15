@extends('base')

@section('contenido')
<div class="container">
	{{ Form::open(array('route' => array('libro_update_post', $libro->id), 'method' => 'POST',
						          'accept-charset' => 'UTF-8', 'enctype' => 'multipart/form-data')) }}
  @if(Session::get('mensaje'))
    <div class="alert alert-success">{{Session::get('mensaje')}}</div>
  @endif
  	<div class="form-group">
  		<label class="control-label"> Codigo:</label>
  		{{ Form::text('codigo', $libro->codigo, ['class' => 'form-control']) }}
  	</div>
  	<div class="form-group">
  		<label class="control-label"> Autores:</label>
  		{{ Form::text('autores', $libro->autores, ['class' => 'form-control']) }}
  	</div>
    <div class="form-group">
      <label class="control-label"> Titulo:</label>
      {{ Form::text('titulo', $libro->titulo, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      <label class="control-label"> Edicion:</label>
      {{ Form::text('edicion', $libro->edicion, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      <label class="control-label"> Anio:</label>
      {{ Form::text('anio', $libro->anio, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      <label class="control-label"> Contenido:</label>
      {{ Form::text('contenido', $libro->contenido, ['class' => 'form-control']) }}
    </div>
  	<div class="form-group">
  		<label class="control-label"> Foto:</label>
  		{{ Form::file('foto') }}
  	</div>
    <div class="form-group">
      <label class="control-label"> Ubicacion:</label>
      
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
    <div class="form-group">
      <label class="control-label"> Estado:</label>
      
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
    <div class="form-group">
      <label class="control-label"> Clasificacion:</label>
      
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
    <div class="form-group">
      <label class="control-label"> Descripcion:</label>
      {{ Form::text('descripcion', $libro->descripcion, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">
      <label class="control-label"> Observaciones:</label>
      {{ Form::text('observaciones', $libro->observaciones, ['class' => 'form-control']) }}
    </div>
  <input class="btn btn-large btn-primary" type="submit" value="Confirmar" />
  <a href="{{ URL::route('biblioteca') }}" class="btn btn-large btn-danger">Cancelar</a>
  {{ Form::close() }}
</div>
@stop