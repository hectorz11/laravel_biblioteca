@extends('base')

@section('contenido')
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
                    <button class="btn btn-primary" type="submit"><i class="icon-white icon-search"></i></button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</center>

<table class="table" border="1" align="center">
    <tr>
        <td width=5%><b>ID. Reg.</b></td>
        <td widht=5%><b>Codigo</b></td>
        <td width=26%><b>Autor(es)</b></td>
        <td width=40%><b>Titulo del Libro</b></td>
        <td width=6%><b>Edicion</b></td>
        <td width=6%><b>Estado</b></td>
        <td width=6%><b>Editar</b></td>
        <td width=6%><b>Borrar</b></td>
    </tr>    
    @foreach($libros as $libro)
    <tr>
        <td>{{ $libro->id }}</td>
        <td>{{ $libro->codigo }}</td>
        <td>{{ $libro->autores }}</td>
        <td>{{ $libro->titulo }}</td>
        <td>{{ $libro->edicion }}</td>
        <td>{{ $libro->estados->nombre }}</td>
        <td><a href="{{ URL::route('libro_update', $libro->id) }}" class='btn btn-mini tn btn-warning'><i class='icon-edit icon-white'></i> Editar</a></td>
        <td><a href="#" class='btn btn-mini tn btn-danger'><i class='icon-remove icon-white'></i> Eliminar</a></td>
    </tr>
    @endforeach
</table>
<script>$("tr:odd").css("background-color", "#bbbbff");</script>

<div class="form-actions" align="center">
    <a href="{{ URL::route('libro_create') }}" class="btn btn-large btn-primary" name="ingresar"></i> Ingresar Nuevo Registro</a> 
    <a href="{{ URL::route('/') }}" class="btn btn-large tn btn-danger"><i class="icon-home icon-white"></i> Regresar al Menu Principal</a>
</div>
@stop