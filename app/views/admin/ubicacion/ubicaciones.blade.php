@extends('base')

@section('contenido')
<div class="container">
    <div class="col-md-6">
        <h3>Ubicaciones - activadas</h3>
        <table class="table table-striped table-bordered table-hover" id="tablaLibros">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Status</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
        @foreach($ubicaciones_1 as $ubicacion_1)
            <tbody>
                <tr>
                    <td>{{ $ubicacion_1->nombre }}</td>
                @if($ubicacion_1->status == 1)
                    <td><button class="btn btn-xs btn-success">Activado</button></td>
                @endif
                    <td>
                        <a href="{{ URL::route('admin_ubicacion_update', $ubicacion_1->id) }}" class="btn btn-info btn-sm">
                            <i class='glyphicon glyphicon-edit'></i> Editar
                        </a>
                    </td>
                </tr>
            </tbody>
        @endforeach
        </table>
    </div>
    <div class="col-md-6">
        <h3>Ubicaciones - no activadas</h3>
        <table class="table table-striped table-bordered table-hover" id="tablaLibros">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Status</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
        @foreach($ubicaciones_0 as $ubicacion_0)
            <tbody>
                <tr>
                    <td>{{ $ubicacion_0->nombre }}</td>
                @if($ubicacion_0->status == 0)
                    <td><button class="btn btn-xs btn-danger">Desactivado</button></td>
                @endif
                    <td>
                        <a href="{{ URL::route('admin_ubicacion_update', $ubicacion_0->id) }}" class="btn btn-info btn-sm">
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
            <a href="{{ URL::route('admin_ubicacion_create') }}" class="btn btn-lg btn-primary" name="ingresar">
                <i class="glyphicon glyphicon-plus-sign"></i> Ingresar Nuevo Registro
            </a>
            <a href="{{ URL::route('/') }}" class="btn btn-lg btn-danger">
                <i class="glyphicon glyphicon-home"></i> Regresar al Menu Principal
            </a>
        </div>
    </div>
</div>
@stop