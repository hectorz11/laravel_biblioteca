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
      <h3>Modifique el Periodico</h3>
    {{ Form::open(array('route' => array('periodico_update_post', $periodico->id), 'files' => true)) }}
    	<div class="row">
    		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Volumen:</label></div>
    		<div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('volumen', $periodico->volumen, ['class' => 'form-control']) }}</div>
    	</div><br>
    	<div class="row">
    		<div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Nombre del Ejemplar:</label></div>
    		<div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('nombre', $periodico->nombre, ['class' => 'form-control']) }}</div>
    	</div>
      @if( $errors->has('nombre') )
        <div class="alert alert-danger">
          @foreach($errors->get('nombre') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Fecha de Inicio:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('fecha_inicio', $periodico->fecha_inicio, ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Fecha de Termino:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('fecha_fin', $periodico->fecha_fin, ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Clasificacion:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">
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
      </div>
      @if( $errors->has('clasificacion_id') )
        <div class="alert alert-danger">
          @foreach($errors->get('clasificacion_id') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Estado:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">
          <select id="estado_id" class="form-control">
            <option value="{{ $periodico->estados->id }}">{{ $periodico->estados->nombre }}</option>
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
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Tipo:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">
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
      </div>
      @if( $errors->has('tipo_id') )
        <div class="alert alert-danger">
          @foreach($errors->get('tipo_id') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Ubicacion:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">
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
      </div>
      @if( $errors->has('ubicacion_id') )
        <div class="alert alert-danger">
          @foreach($errors->get('ubicacion_id') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Descripcion:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::textArea('descripcion', $periodico->descripcion, ['class' => 'form-control', 'rows' => 3]) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Observaciones:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::textArea('observaciones', $periodico->observaciones, ['class' => 'form-control', 'rows' => 3]) }}</div>
      </div><br>
      <div class="form-actions" align="center">
        <button type="submit" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Confirmar</button>
        <a href="{{ URL::route('hemeroteca') }}" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</a>
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
@stop