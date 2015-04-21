@extends('base')

@section('contenido')
<div class="container">
	{{ Form::open(array('route' => 'libro_create_post', 'method' => 'POST',
						          'accept-charset' => 'UTF-8', 'enctype' => 'multipart/form-data')) }}
  @if(Session::get('mensaje'))
    <div class="alert alert-success">{{Session::get('mensaje')}}</div>
  @endif
  <table class="table table-striped">
  	<tr>
  		<td><label class="control-label"> Codigo:</label></td>
  		<td>{{ Form::text('codigo', Input::old('codigo')) }}</td>
  	</tr>
  	<tr>
  		<td><label class="control-label"> Autores:</label></td>
  		<td>{{ Form::text('autores', Input::old('autores')) }}</td>
  	</tr>
    <tr>
      <td><label class="control-label"> Titulo:</label></td>
      <td>{{ Form::text('titulo', Input::old('titulo')) }}</td>
    </tr>
    <tr>
      <td><label class="control-label"> Edicion:</label></td>
      <td>{{ Form::text('edicion', Input::old('edicion')) }}</td>
    </tr>
    <tr>
      <td><label class="control-label"> Anio:</label></td>
      <td>{{ Form::text('anio', Input::old('anio')) }}</td>
    </tr>
    <tr>
      <td><label class="control-label"> Contenido:</label></td>
      <td>{{ Form::text('contenido', Input::old('contenido')) }}</td>
    </tr>
  	<tr>
  		<td><label class="control-label"> Foto:</label></td>
  		<td>{{ Form::file('foto') }}</td>
  	</tr>
    <tr>
      <td><label class="control-label"> Ubicacion:</label></td>
      <td>
        <select id="ubicacion_id">
          <option>-- Ubicaciones --</option>
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
          <option>-- Estados --</option>
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
        <select id="clasificacion_id">
          <option>-- Clasificaciones --</option>
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
      <td>{{ Form::text('descripcion', Input::old('descripcion')) }}</td>
    </tr>
    <tr>
      <td><label class="control-label"> Observaciones:</label></td>
      <td>{{ Form::text('observaciones', Input::old('observaciones')) }}</td>
    </tr>
  </table>
  <input class="btn btn-large btn-primary" type="submit" value="Confirmar" />
  <a href="{{ URL::route('/') }}" class="btn btn-large btn-danger">Cancelar</a>
  {{ Form::close() }}
</div>
@stop