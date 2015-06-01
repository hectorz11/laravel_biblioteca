@extends('base')

@section('contenido')
<br><br><br><br>
<div class="container">
  <div class="col-md-8">
    <div class="widget sidebar-widget popular-agent">
      <h3 class="widgettitle">Modifique el Periodico</h3>
    {{ Form::open(array('route' => array('periodico_create_post', $periodico->id), 'files' => true)) }}
      @if(Session::get('mensaje'))
      <div class="alert alert-{{ Session::get('class') }}">{{ Session::get('mensaje') }}</div>
      @endif
    	<div class="row">
    		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Volumen:</label></div>
    		<div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('volumen', $periodico->volumen, ['class' => 'form-control']) }}</div>
    	</div><br>
    	<div class="row">
    		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Nombre del Ejemplar:</label></div>
    		<div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('nombre', $periodico->nombre, ['class' => 'form-control']) }}</div>
    	</div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Fecha de Inicio:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('fecha_inicio', $periodico->fecha_inicio, ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Fecha de Termino:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('fecha_fin', $periodico->fecha_fin, ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Estado:</label></div>
        <div class="col-md-6 col-xs-9 col-sm-6">
          <select name="estado_id" class="form-control">
            <option value="{{ $periodico->estados->id }}">{{ $periodico->estados->nombre }}</option>
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
          <select id="clasificacion_id" class="form-control">
            <option value="{{ $periodico->clasificaciones->id }}">{{ $periodico->clasificaciones->nombre }}</option>
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
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Tipo:</label></div>
        <div class="col-md-6 col-xs-9 col-sm-6">
          <select id="tipo_id" class="form-control">
            <option value="{{ $periodico->tipos->id }}">{{ $periodico->tipos->nombre }}</option>
            <option>------------------------------</option>
            @if(isset($tipo))
              @foreach($tipo as $t)
              <option value="{{ $t->id }}">{{ $t->nombre }}</option>
              @endforeach
            @endif
          </select>
        </div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Ubicacion:</label></div>
        <div class="col-md-6 col-xs-9 col-sm-6">
          <select id="ubicacion_id" class="form-control">
            <option value="{{ $periodico->ubicaciones->id }}">{{ $periodico->ubicaciones->nombre }}</option>
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
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Descripcion:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('descripcion', $periodico->descripcion, ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Observaciones:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('observaciones', $periodico->observaciones, ['class' => 'form-control']) }}</div>
      </div><br>
      <input class="btn btn-lg btn-primary" type="submit" value="Confirmar" />
      <a href="{{ URL::route('/') }}" class="btn btn-lg btn-danger">Cancelar</a>
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
            <th>Periodico</th>
          </tr>
        </thead>
        <tbody>
        @foreach($periodicos as $periodico)
        <tr>
          <td><span class="badge">{{ $periodico->created_at }}</span></td>
          <td><a href="{{ URL::route('periodico_update', $periodico->id) }}">{{ $periodico->nombre }}</a></td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop