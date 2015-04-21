@extends('base')

@section('contenido')
<div class="container">
	{{ Form::open(array('route' => array('libro_update_post', $libro->id), 'method' => 'POST',
						          'accept-charset' => 'UTF-8', 'enctype' => 'multipart/form-data')) }}
  @if(Session::get('mensaje'))
    <div class="alert alert-success">{{Session::get('mensaje')}}</div>
  @endif
  <table class="table table-striped">
  	<tr>
  		<td><label class="control-label"> Codigo:</label></td>
  		<td>{{ Form::text('codigo', $libro->codigo) }}</td>
  	</tr>
  	<tr>
  		<td><label class="control-label"> Autores:</label></td>
  		<td>{{ Form::text('autores', $libro->autores) }}</td>
  	</tr>
    <tr>
      <td><label class="control-label"> Titulo:</label></td>
      <td>{{ Form::text('titulo', $libro->titulo) }}</td>
    </tr>
    <tr>
      <td><label class="control-label"> Edicion:</label></td>
      <td>{{ Form::text('edicion', $libro->edicion) }}</td>
    </tr>
    <tr>
      <td><label class="control-label"> Anio:</label></td>
      <td>{{ Form::text('anio', $libro->anio) }}</td>
    </tr>
    <tr>
      <td><label class="control-label"> Contenido:</label></td>
      <td>{{ Form::text('contenido', $libro->contenido) }}</td>
    </tr>
  	<tr>
  		<td><label class="control-label"> Foto:</label></td>
  		<td>{{ Form::file('foto') }}</td>
  	</tr>
    <tr>
      <td><label class="control-label"> Ubicacion:</label></td>
      <td>
        <select name="ubicacion_id">
          <option value="{{ $libro->ubicaciones->id }}">{{ $libro->ubicaciones->nombre }}</option>
          <option>------------------------------</option>
          @if(isset($ubicacion))
            @foreach($ubicacion as $u)
            <option value="{{ $u->id }}">{{ $u->nombre }}</option>
            @endforeach
          @endif
        </select>
      </td>
    </tr>
    <tr>
      <td><label class="control-label"> Estado:</label></td>
      <td>
        <select name="estado_id">
          <option value="{{ $libro->estados->id }}">{{ $libro->estados->nombre }}</option>
          <option>------------------------------</option>
          @if(isset($estado))
            @foreach($estado as $e)
            <option value="{{ $e->id }}">{{ $e->nombre }}</option>
            @endforeach
          @endif
        </select>
      </td>
    </tr>
    <tr>
      <td><label class="control-label"> Clasificacion:</label></td>
      <td>
        <select name="clasificacion_id">
          <option value="{{ $libro->clasificaciones->id }}">{{ $libro->clasificaciones->nombre }}</option>
          <option>------------------------------</option>
          @if(isset($clasificacion))
            @foreach($clasificacion as $c)
            <option value="{{ $c->id }}">{{ $c->nombre }}</option>
            @endforeach
          @endif
        </select>
      </td>
    </tr>
    <tr>
      <td><label class="control-label"> Descripcion:</label></td>
      <td>{{ Form::text('descripcion', $libro->descripcion) }}</td>
    </tr>
    <tr>
      <td><label class="control-label"> Observaciones:</label></td>
      <td>{{ Form::text('observaciones', $libro->observaciones) }}</td>
    </tr>
  </table>
  <input class="btn btn-large btn-primary" type="submit" value="Confirmar" />
  <a href="{{ URL::route('biblioteca') }}" class="btn btn-large btn-danger">Cancelar</a>
  {{ Form::close() }}
</div>
@stop