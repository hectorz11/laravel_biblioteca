@extends('base')

@section('contenido')
<div class="container">
    @if(Session::has('mensaje'))
      <div class="alert alert-{{ Session::get('class') }}">
        <strong>{{ Session::get('mensaje') }}</strong>
        <button type="button" class="close" data-dismiss="alert">×</button>
      </div>
    @endif
      <h3>Ingrese el Comentario</h3>
    {{ Form::open(array('route' => 'comentario_create_post', 'files' => true)) }}
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          {{ Form::text('descripcion', Input::old('descripcion'), ['class' => 'form-control', 'placeholder' => 'Comentario']) }}
      </div>
      @if( $errors->has('descripcion') )
        <div class="alert alert-danger">
          @foreach($errors->get('descripcion') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="form-actions" align="center">
        <button type="submit" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Confirmar</button>
        <a href="{{ URL::route('comentarios') }}" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</a>
      </div>
    {{ Form::close() }}
</div>
@stop