@extends('base')

@section('contenido')
<br><br><br><br>
<div class="container">
  <div class="col-md-8">
    <div class="widget sidebar-widget popular-agent">
      <h3 class="widgettitle">Modifique el Libro</h3>
    {{ Form::open(array('route' => array('libro_update_post', $libro->id), 'files' => true)) }}
      @if(Session::get('mensaje'))
      <div class="alert alert-success">{{Session::get('mensaje')}}</div>
      @endif
    	<div class="row">
    		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Codigo:</label></div>
    		<div class="col-md-6 col-xs-9 col-sm-6">{{ Form::text('codigo', $libro->codigo, ['class' => 'form-control']) }}</div>
    	</div><br>
    	<div class="row">
    		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Autores:</label></div>
    		<div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('autores', $libro->autores, ['class' => 'form-control']) }}</div>
    	</div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Titulo:</label></div>
        <div class="col-md-8 col-xs-12 col-sm-8">{{ Form::text('titulo', $libro->titulo, ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Edicion:</label></div>
        <div class="col-md-6 col-xs-9 col-sm-6">{{ Form::text('edicion', $libro->edicion, ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Anio:</label></div>
        <div class="col-md-4 col-xs-6 col-sm-4">{{ Form::text('anio', $libro->anio, ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Contenido:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('contenido', $libro->contenido, ['class' => 'form-control']) }}</div>
      </div><br>
    	<div class="row">
    		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Foto:</label></div>
    		<div class="col-md-8 col-xs-12 col-sm-8">{{ Form::file('foto') }}</div>
    	</div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Ubicacion:</label></div>
        <div class="col-md-6 col-xs-9 col-sm-6">
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
          <div class="col-md-6 col-xs-9 col-sm-6">
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
        <div class="col-md-6 col-xs-9 col-sm-6">
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
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('descripcion', $libro->descripcion, ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Observaciones:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('observaciones', $libro->observaciones, ['class' => 'form-control']) }}</div>
      </div><br>
      <input class="btn btn-lg btn-primary" type="submit" value="Confirmar" />
      <a href="{{ URL::route('biblioteca') }}" class="btn btn-lg btn-danger">Cancelar</a>
    {{ Form::close() }}
    </div>
  </div>
  <!-- Start Sidebar -->
  <div class="col-md-4">
    <div class="widget sidebar-widget popular-agent">
      <h3 class="widgettitle">Bienvenido</h3>
        {{ $user->first_name}} {{ $user->last_name }}
      <br>
    </div>
    <div class="widget sidebar-widget latest-testimonials">
      <h3 class="widgettitle">Archivo Regional Tacna</h3>
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
</div>
@stop