@extends('base')

@section('contenido')
<br>
<div class="container">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Permisos</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($groups as $group)
                <tr>
                    <td>{{ $group->id }}</td>
                    <td>{{ $group->name }}</td>
                    <td>
                    @foreach ($group->getPermissions() as $name => $activated)
                        <ul>{{ $name }} = {{ $activated }}</ul>
                    @endforeach
                    </td>
                    <td>{{ $group->created_at }}</td>
                    <td>{{ $group->updated_at }}</td>
                    <td><a href="{{ URL::route('admin_group_update', $group->id) }}">Editar</a></td>
                    <td><a href="{{ URL::route('/') }}">Eliminar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="form-actions" align="center">
            <a href="{{ URL::route('libro_create') }}" class="btn btn-lg btn-primary" name="ingresar">
                <i class="glyphicon glyphicon-plus-sign"></i> Ingresar Nuevo Registro
            </a> 
            <a href="{{ URL::route('/') }}" class="btn btn-lg btn-danger">
                <i class="glyphicon glyphicon-home"></i> Regresar al Menu Principal
            </a>
        </div>
    </div>
</div>
@stop