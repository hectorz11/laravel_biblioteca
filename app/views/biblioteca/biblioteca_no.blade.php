@extends('base')

@section('contenido')
<br>
<div class="container">
<link href="{{ URL::asset('/assets/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
<div class="col-md-12">
    <table class="table table-striped table-bordered table-hover" id="tablaLibros">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Autor(es)</th>
                <th>Título del Libro</th>
                <th>Edición</th>
                <th>Estado</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
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
        <a href="{{ URL::route('/') }}" class="btn btn-lg btn-danger"><i class="glyphicon glyphicon-home"></i> Regresar al Menu Principal</a>
    </div>
</div>
<div class="modal fade" id="Recuperar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                <i class="glyphicon glyphicon-share"></i> Recuperar Libro<br>
                <span id="load"><center><img src="{{ asset('img/loading1.gif')}}"> Cargando...</center></span></h4>
            </div>
            <div class="modal-body">
                <!-- Start Form -->
                {{ Form::open(['route' => 'admin_libro_recuperar_post', 'id' => 'formEdit']) }}
                    <div class="row">
                        <div class="col-md-12">
                            <label>Titulo del Libro a recuperar</label>
                            {{ Form::text('titulo', Input::old('titulo'), ['class' => 'form-control']) }}
                        </div>
                    </div><br>
                    {{ Form::hidden('idLibro') }}
                    {{ Form::hidden('libro', '', ['id' => 'val']) }}
                    <div class="">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="glyphicon glyphicon-check"></i> Recuperar</button>
                    </div>
                {{ Form::close() }}
                <!-- End Form -->
            </div>
        </div>
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
        $('#tablaLibros').dataTable({
            "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 5 ]},{ "bVisible": false, "aTargets": [0] }],
            "displayLength":10,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '/admin/datatable/libros/no',
        });
        $("#tablaLibros").on("click", ".edit", function(e){
            $('[name=libro]').val($(this).attr ('id'));
            var faction = "<?php echo URL::to('/admin/data/libro'); ?>";
            var fdata = $('#val').serialize();
            $('#load').show();
            $.get(faction, fdata, function(json) {
                if (json.success) {
                    $('#formEdit input[name="idLibro"]').val(json.idLibro);
                    $('#formEdit input[name="titulo"]').val(json.titulo);
                    $('#load').hide();
                } else {
                    $('#errorMessage').html(json.message);
                    $('#errorMessage').show();
                }
            });
        });
    });
</script>
@stop