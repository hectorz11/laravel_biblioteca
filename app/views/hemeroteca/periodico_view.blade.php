@extends('base')

@section('contenido')
<center>
    <div class="input-prepend input-append" align="center">
        <div class="busqueda">
            {{ Form::open(array('route' => 'periodico_search_post', 'method' => 'POST',
                                'accept-charset' => 'UTF-8', 'enctype' => 'multipart/form-data')) }}
                <select name="opcion">
                    <option value="1">Volumen</option>
                    <option value="2">Nombre de Ejemplar</option>
                </select>
                {{ Form::text('buscar', Input::old('buscar'), ['class' => 'form-control']) }}
                <div class="btn-group">
                    <button class="btn btn-primary" type="submit"><i class="icon-white icon-search"></i></button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</center>

<table class="table" border="1" align="center">
    <tr>
        <td><b>ID. Reg.</b></td>
        <td><b>Volumen</b></td>
        <td><b>Nombre del Ejemplar</b></td>
        <td><b>Fecha de Inicio</b></td>
        <td><b>Fecha de Termino</b></td>
        <td><b>Estado</b></td>
        <td><b>Editar</b></td>
        <td><b>Borrar</b></td>
    </tr>    
    @foreach($periodicos as $periodico)
    <tr>
        <td>{{ $periodico->id }}</td>
        <td>{{ $periodico->volumen }}</td>
        <td>{{ $periodico->nombre }}</td>
        <td>{{ $periodico->fecha_inicio }}</td>
        <td>{{ $periodico->fecha_final }}</td>
        <td>{{ $periodico->estados->nombre }}</td>
        <td><a href="{{ URL::route('periodico_update', $periodico->id) }}" class='btn btn-mini tn btn-warning'><i class='icon-edit icon-white'></i> Editar</a></td>
        <td><a href="#" class='btn btn-mini tn btn-danger'><i class='icon-remove icon-white'></i> Eliminar</a></td>
    </tr>
    @endforeach
</table>
<script>$("tr:odd").css("background-color", "#bbbbff");</script>

<div class="form-actions" align="center">
    <a href="{{ URL::route('periodico_create') }}" class="btn btn-large btn-primary" name="ingresar"></i> Ingresar Nuevo Registro</a> 
    <a href="{{ URL::route('/') }}" class="btn btn-large tn btn-danger"><i class="icon-home icon-white"></i> Regresar al Menu Principal</a>
</div>
@stop