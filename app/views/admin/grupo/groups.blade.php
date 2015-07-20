@extends('base')

@section('contenido')
<br>
<div class="container">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Grupo</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha de Actualización</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->created_at }}</td>
                    <td>{{ $group->updated_at }}</td>
                    <td>
                        <a href="{{ URL::route('admin_group_update', $group->id) }}" class="btn btn-sm btn-info">
                            <i class='glyphicon glyphicon-edit'></i> Editar</a>
                        <a href="{{ URL::route('/') }}" class="btn btn-sm btn-danger">
                            <i class='glyphicon glyphicon-remove-circle'></i> Eliminar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="form-actions" align="center">
            <a href="{{ URL::route('admin_group_create') }}" class="btn btn-lg btn-primary" name="ingresar">
                <i class="glyphicon glyphicon-plus-sign"></i> Ingresar Nuevo Registro
            </a> 
            <a href="{{ URL::route('/') }}" class="btn btn-lg btn-danger">
                <i class="glyphicon glyphicon-home"></i> Regresar al Menu Principal
            </a>
        </div>
    </div>
</div>
@stop