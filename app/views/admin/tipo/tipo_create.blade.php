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
      <h3>Ingrese el Tipo</h3>
    {{ Form::open(array('route' => 'admin_tipo_create_post')) }}
      <div class="row">
        <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Nombre:</label></div>
        <div class="col-md-10 col-xs-15 col-sm-10">{{ Form::text('nombre', Input::old('nombre'), ['class' => 'form-control']) }}</div>
      </div>
      @if( $errors->has('nombre') )
        <div class="alert alert-danger">
          @foreach($errors->get('nombre') as $error)
            * {{$error}}</br>
          @endforeach
        </div>
      @endif<br>
      <div class="form-actions" align="center">
        <button type="submit" class="btn btn-lg btn-primary"><i class="glyphicon glyphicon-floppy-saved"></i> Confirmar</button>
        <a href="{{ URL::route('admin_tipos') }}" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</a>
      </div>
    {{ Form::close() }}
  </div>
  <div class="col-md-4">
    
  </div>   
</div>
@stop