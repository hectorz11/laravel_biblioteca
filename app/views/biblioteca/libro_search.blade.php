@extends('base')

@section('contenido')
<div class="hero-unit">
<h1><center>¿Qué desea buscar?</center></h1><br><br>
    <center>
        <div class="input-prepend input-append" align="center">
            <div class="busqueda">
            {{ Form::open(array('route' => 'libro_search_post', 'method' => 'POST',
                                'accept-charset' => 'UTF-8', 'enctype' => 'multipart/form-data')) }}
                <select name="opcion">
                    <option value="1">Codigo</option>
                    <option value="2">Autor</option>
                    <option value="3">Titulo del Libro</option>
                </select>
                {{ Form::text('buscar', Input::old('buscar'), ['class' => 'form-control']) }}
                <div class="btn-group">
                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                </div>
            {{ Form::close() }}
            </div>
        </div><br><br>
        <a href="{{ URL::route('/') }}" class="btn btn-large tn btn-danger"><i class="icon-home icon-white"></i> Regresar al Menu Principal</a>
    </center> 
</div>
@stop