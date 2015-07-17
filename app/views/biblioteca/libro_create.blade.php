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
      <h3>Ingrese el Libro</h3>
    {{ Form::open(array('route' => 'libro_create_post', 'files' => true)) }}
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
          {{ Form::text('codigo', Input::old('codigo'), ['class' => 'form-control', 'placeholder' => 'Codigo']) }}
      </div><br>
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          {{ Form::textArea('autores', Input::old('autores'), ['class' => 'form-control', 'placeholder' => 'Autores', 'rows' => 2]) }}
      </div>
      @if( $errors->has('autores') )
        <div class="alert alert-danger">
          @foreach($errors->get('autores') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
          {{ Form::text('titulo', Input::old('titulo'), ['class' => 'form-control', 'placeholder' => 'Titulo']) }}
      </div>
      @if( $errors->has('titulo') )
        <div class="alert alert-danger">
          @foreach($errors->get('titulo') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
          {{ Form::text('edicion', Input::old('edicion'), ['class' => 'form-control', 'placeholder' => 'Edicion']) }}
      </div><br>
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
          {{ Form::text('anio', Input::old('anio'), ['class' => 'form-control', 'placeholder' => 'Año']) }}
      </div><br>
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
          {{ Form::textArea('contenido', Input::old('contenido'), ['class' => 'form-control', 'placeholder' => 'Contenido', 'rows' => 2]) }}
      </div><br>
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
          {{ Form::file('foto', ['class' => 'form-control']) }}
      </div><br>
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
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
          <span class="input-group-addon"><i class="glyphicon glyphicon-stats"></i></span>
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
          <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
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
          <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
          {{ Form::textArea('descripcion', Input::old('descripcion'), ['class' => 'form-control', 'placeholder' => 'Descripcion', 'rows' => 3]) }}
      </div><br>
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>
          {{ Form::textArea('observaciones', Input::old('observaciones'), ['class' => 'form-control', 'placeholder' => 'Observaciones', 'rows' => 3]) }}
      </div>
      <br>
      <div class="form-actions" align="center">
        <button type="submit" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Confirmar</button>
        <a href="{{ URL::route('biblioteca') }}" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</a>
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
@stop