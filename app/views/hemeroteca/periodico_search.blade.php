@extends('base')

@section('contenido')
<br>
<div class="container">
<link href="{{ URL::asset('/assets/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
<div class="col-md-12">
    <table class="table table-striped table-bordered table-hover" id="tablaPeriodicos">
        <thead>
            <th>ID</th>
            <th>Volumen</th>
            <th>Nombre del Ejemplar</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Termino</th>
            <th>Estado</th>
        </thead> 
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <div class="form-actions" align="center">
        <a href="{{ URL::route('periodico_create') }}" class="btn btn-lg btn-primary" name="ingresar"></i> Ingresar Nuevo Registro</a> 
        <a href="{{ URL::route('/') }}" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-home"></i> Regresar al Menu Principal</a>
    </div>
</div>
</div>

<script src="{{ URL::asset('/assets/js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dataTables/dataTables.bootstrap.js') }}"></script>

   <!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        event.preventDefault()
        $('#tablaPeriodicos').dataTable({
            "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 5 ]},{ "bVisible": false, "aTargets": [0] }],
            "displayLength":10,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '/datatable/periodicos',
        });
    });
</script>
@stop