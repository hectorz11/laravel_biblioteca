@extends('base')

@section('contenido')
<div class="container">
    <div class="col-md-6">
        <pre>Clasificaciones activadas</pre>
        <table class="table table-striped table-bordered table-hover" id="tablaLibros">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Status</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
        @foreach($clasificaciones_1 as $clasificacion_1)
            <tbody>
                <tr>
                    <td>{{ $clasificacion_1->nombre }}</td>
                    <td>{{ $clasificacion_1->status }}</td>
                    <td>
                        <a href="{{ URL::route('admin_clasificacion_update', $clasificacion_1->id) }}" class="btn btn-info btn-sm">
                            <i class='glyphicon glyphicon-edit'></i> Editar
                        </a>
                    </td>
                </tr>
            </tbody>
        @endforeach
        </table>
    </div>
    <div class="col-md-6">
        <pre>Clasificaciones no activadas</pre>
        <table class="table table-striped table-bordered table-hover" id="tablaLibros">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Status</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
        @foreach($clasificaciones_0 as $clasificacion_0)
            <tbody>
                <tr>
                    <td>{{ $clasificacion_0->nombre }}</td>
                    <td>{{ $clasificacion_0->status }}</td>
                    <td>
                        <a href="{{ URL::route('admin_clasificacion_update', $clasificacion_0->id) }}" class="btn btn-info btn-sm">
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
            <a href="{{ URL::route('admin_clasificacion_create') }}" class="btn btn-lg btn-primary" name="ingresar">
                <i class="glyphicon glyphicon-plus-sign"></i> Ingresar Nuevo Registro
            </a> 
            <a href="{{ URL::route('/') }}" class="btn btn-lg btn-danger">
                <i class="glyphicon glyphicon-home"></i> Regresar al Menu Principal
            </a>
        </div>
    </div>
</div>
@stop