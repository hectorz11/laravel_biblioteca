@extends('base')

@section('contenido')
<div class="container">
	{{ Form::open(array('route' => 'periodico_create_post', 'method' => 'POST',
						          'accept-charset' => 'UTF-8', 'enctype' => 'multipart/form-data')) }}
  @if(Session::get('mensaje'))
    <div class="alert alert-success">{{Session::get('mensaje')}}</div>
  @endif
  <table class="table table-striped">
  	<tr>
  		<td><label class="control-label"> Volumen:</label></td>
  		<td>{{ Form::text('volumen', Input::old('volumen')) }}</td>
  	</tr>
  	<tr>
  		<td><label class="control-label"> Nombre del Ejemplar:</label></td>
  		<td>{{ Form::text('nombre', Input::old('nombre')) }}</td>
  	</tr>
    <tr>
      <td><label class="control-label"> Fecha de Inicio:</label></td>
      <td>{{ Form::text('fecha_inicio', Input::old('fecha_inicio')) }}</td>
    </tr>
    <tr>
      <td><label class="control-label"> Fecha de Termino:</label></td>
      <td>{{ Form::text('fecha_fin', Input::old('fecha_fin')) }}</td>
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
      <td><label class="control-label"> Tipo:</label></td>
      <td>
        <select id="tipo_id">
          <option>-- Tipos --</option>
          @if(isset($tipo))
            @foreach($tipo as $t)
            <option value="{{ $t->id }}">{{ $t->nombre }}</option>
            @endforeach
          @endif
        </select>
      </td>
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