@extends('base')

@section('contenido')
<br><br><br><br>
<center>
    <div class="input-prepend input-append" align="center">
        <div class="busqueda">
            {{ Form::open(array('route' => 'libro_search_post', 'files' => true )) }}
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
<div class="col-md-12">
<table class="table table-striped">
    <thead>
    <tr>
        <th>ID. Reg.</th>
        <th>Codigo</th>
        <th>Autor(es)</th>
        <th>Titulo del Libro</th>
        <th>Edicion</th>
        <th>Estado</th>
        @if(Sentry::check())
        <th>Editar</th>
        <th>Borrar</th>
        @endif
    </tr>
    </thead>
    @foreach($libros as $libro)
    <tr>
        <td>{{ $libro->id }}</td>
        <td>{{ $libro->codigo }}</td>
        <td>{{ $libro->autores }}</td>
        <td>{{ $libro->titulo }}</td>
        <td>{{ $libro->edicion }}</td>
        <td>{{ $libro->estados->nombre }}</td>
        @if(Sentry::check())
        <td><a href="{{ URL::route('libro_update', $libro->id) }}" class='btn btn-sm btn-warning'><i class='icon-edit icon-white'></i> Editar</a></td>
        <td><a href="#" class='btn btn-sm btn-danger'><i class='icon-remove icon-white'></i> Eliminar</a></td>
        @endif
    </tr>
    @endforeach
</table>
<div class="pagination">
    {{ $libros->links() }}
</div>
    <div class="form-actions" align="center">
        <a href="{{ URL::route('libro_create') }}" class="btn btn-lg btn-primary" name="ingresar"></i> Ingresar Nuevo Registro</a> 
        <a href="{{ URL::route('/') }}" class="btn btn-lg btn-danger"><i class="icon-home icon-white"></i> Regresar al Menu Principal</a>
    </div>
</div>
@stop