@extends('base')

@section('contenido')
<br><br><br><br>
<div class="container">
  <div class="col-md-8">
    <div class="widget sidebar-widget popular-agent">
      <h3 class="widgettitle">Ingrese el Libro</h3>
    {{ Form::open(array('route' => 'libro_create_post', 'files' => true)) }}
      @if(Session::get('mensaje'))
      <div class="alert alert-{{ Session::get('class') }}">{{Session::get('mensaje')}}</div>
      @endif
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Codigo:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('codigo', Input::old('codigo'), ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Autores:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('autores', Input::old('autores'), ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Titulo:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('titulo', Input::old('titulo'), ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Edicion:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('edicion', Input::old('edicion'), ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Anio:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('anio', Input::old('anio'), ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Contenido:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('contenido', Input::old('contenido'), ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Foto:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::file('foto', ['class' => 'form-control']) }}</div>
      </div><br>
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Ubicacion:</label></div>
        <div class="col-md-6 col-xs-9 col-sm-6">
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
        <div class="col-md-6 col-xs-9 col-sm-6">
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
        <div class="col-md-6 col-xs-9 col-sm-6">
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
      <br>
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
            <th>Libro</th>
          </tr>
        </thead>
        <tbody>
        @foreach($libros as $libro)
        <tr>
          <td><span class="badge">{{ $libro->created_at }}</span></td>
          <td><a href="{{ URL::route('libro_update', $libro->id) }}">{{ $libro->titulo }}</a></td>
        </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@stop