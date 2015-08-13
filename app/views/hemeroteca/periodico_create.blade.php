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
      <h3>Ingrese el Periodico</h3>
  	{{ Form::open(['route' => 'admin_periodico_create_post', 'files' => true]) }}
    	<div class="input-group">
      		<span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i> </span>
      		{{ Form::text('volumen', Input::old('volumen'), ['class' => 'form-control', 'placeholder' => 'Volumen']) }}
    	</div><br>
    	<div class="input-group">
      		<span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i> </span>
      		{{ Form::text('nombre', Input::old('nombre'), ['class' => 'form-control', 'placeholder' => 'Nombre del Ejemplar']) }}
    	</div>
      @if( $errors->has('nombre') )
        <div class="alert alert-danger">
          @foreach($errors->get('nombre') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i> </span>
          {{ Form::text('fecha_inicio', Input::old('fecha_inicio'), ['class' => 'form-control', 'placeholder' => 'Fecha de Inicio']) }}
      </div><br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i> </span>
        {{ Form::text('fecha_fin', Input::old('fecha_fin'), ['class' => 'form-control', 'placeholder' => 'Fecha de Termino']) }}
      </div><br>
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i> </span>
          <select id="clasificacion_id" class="form-control">
            <option>-- Clasificaciones --</option>
            @if(isset($clasificacion))
              @foreach($clasificacion as $c)
              <option value="{{ $c->id }}">{{ $c->nombre }}</option>
              @endforeach
            @endif
          </select>
      </div>
      @if( $errors->has('clasificacion_id') )
        <div class="alert alert-danger">
          @foreach($errors->get('clasificacion_id') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i> </span>
          <select id="estado_id" class="form-control">
            <option>-- Estados --</option>
            @if(isset($estado))
              @foreach($estado as $e)
              <option value="{{ $e->id }}">{{ $e->nombre }}</option>
              @endforeach
            @endif
          </select>
      </div>
      @if( $errors->has('estado_id') )
        <div class="alert alert-danger">
          @foreach($errors->get('estado_id') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i> </span>
          <select id="tipo_id" class="form-control">
            <option>-- Tipos --</option>
            @if(isset($tipo))
              @foreach($tipo as $t)
              <option value="{{ $t->id }}">{{ $t->nombre }}</option>
              @endforeach
            @endif
          </select>
      </div>
      @if( $errors->has('tipo_id') )
        <div class="alert alert-danger">
          @foreach($errors->get('tipo_id') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i> </span>  
          <select id="ubicacion_id" class="form-control">
            <option>-- Ubicaciones --</option>
            @if(isset($ubicacion))
              @foreach($ubicacion as $u)
              <option value="{{ $u->id }}">{{ $u->nombre }}</option>
              @endforeach
            @endif
          </select>
      </div>
      @if( $errors->has('ubicacion_id') )
        <div class="alert alert-danger">
          @foreach($errors->get('ubicacion_id') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i> </span>
        {{ Form::textArea('descripcion', Input::old('descripcion'), ['class' => 'form-control', 'placeholder' => 'Descripcion', 'rows' => 3]) }}
      </div><br>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i> </span>
        {{ Form::textArea('observaciones', Input::old('observaciones'), ['class' => 'form-control', 'placeholder' => 'Observaciones', 'rows' => 3]) }}
      </div><br>
      <div class="form-actions" align="center">
        <button type="submit" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Confirmar</button>
        <a href="{{ URL::route('admin_hemeroteca') }}" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</a>
      </div>
      {{ Form::close() }}
  </div>
  <!-- Start Sidebar -->
  <div class="col-md-4">
      <h3>Bienvenido</h3>
        {{ $user->first_name}} {{ $user->last_name }}
      <br>
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
          <td><a href="{{ URL::route('admin_periodico_update', $periodico->id) }}">{{ $periodico->nombre }}</a></td>
        </tr>
        @endforeach
        </tbody>
      </table>
  </div>
</div>
@stop