@extends('base')

@section('contenido')
<div class="container">
    <div class="col-md-6">
        <pre>Estados activadas</pre>
        <table class="table table-striped table-bordered table-hover" id="tablaLibros">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Status</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
        @foreach($estados_1 as $estado_1)
            <tbody>
                <tr>
                    <td>{{ $estado_1->nombre }}</td>
                    <td>{{ $estado_1->status }}</td>
                    <td>
                        <a href="{{ URL::route('admin_estado_update', $estado_1->id) }}" class="btn btn-info btn-sm">
                            <i class='glyphicon glyphicon-edit'></i> Editar
                        </a>
                    </td>
                </tr>
            </tbody>
        @endforeach
        </table>
    </div>
    <div class="col-md-6">
        <pre>Estados no activadas</pre>
        <table class="table table-striped table-bordered table-hover" id="tablaLibros">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Status</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
        @foreach($estados_0 as $estado_0)
            <tbody>
                <tr>
                    <td>{{ $estado_0->nombre }}</td>
                    <td>{{ $estado_0->status }}</td>
                    <td>
                        <a href="{{ URL::route('admin_estado_update', $estado_0->id) }}" class="btn btn-info btn-sm">
                            <i class='glyphicon glyphicon-edit'></i> Editar
                        </a>
                    </td>
                </tr>
            </tbody>
        @endforeach
        </table>
    </div>
    <div class="col-md-12">
        <div class="form-actions" align="center">
            <a href="{{ URL::route('admin_estado_create') }}" class="btn btn-lg btn-primary" name="ingresar">
                <i class="glyphicon glyphicon-plus-sign"></i> Ingresar Nuevo Registro
            </a> 
            <a href="{{ URL::route('/') }}" class="btn btn-lg btn-danger">
                <i class="glyphicon glyphicon-home"></i> Regresar al Menu Principal
            </a>
        </div>
    </div>
</div>
@stop