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
            <th>Operaciones</th>
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
        <a href="{{ URL::route('/') }}" class="btn btn-lg tn btn-danger"><i class="glyphicon glyphicon-home"></i> Regresar al Menu Principal</a>
    </div>
</div>
<div class="modal fade" id="Recuperar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                <i class="glyphicon glyphicon-share"></i> Recuperar Periodico<br>
                <span id="load"><center><img src="{{ asset('img/loading1.gif')}}"> Cargando...</center></span></h4>
            </div>
            <div class="modal-body">
                <!-- Formulario -->
                <form role="form" action="{{ URL::route('periodico_recuperar_post')}}" method="post" id="formEdit">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Titulo del Periodico a recuperar</label>
                            {{ Form::text('nombre', Input::old('nombre'), ['class' => 'form-control']) }}
                        </div>
                    </div><br>
                    <input type="hidden" name="idPeriodico">
                    <input id="val" type="hidden" name="periodico" class="input-block-level" value="">
                    <div class="">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="glyphicon glyphicon-check"></i> Recuperar</button>
                    </div>
                </form>
            </div>
            <!--  -->
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
        $('#tablaPeriodicos').dataTable({
            "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 5 ]},{ "bVisible": false, "aTargets": [0] }],
            "displayLength":10,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '/admin/datatable/periodicos/no',
        });

        $("#tablaPeriodicos").on("click", ".edit", function(e){
            $('[name=periodico]').val($(this).attr ('id'));
            var faction = "<?php echo URL::to('/data/periodico'); ?>";
            var fdata = $('#val').serialize();
            $('#load').show();
            $.get(faction, fdata, function(json) {
                if (json.success) {
                    $('#formEdit input[name="idPeriodico"]').val(json.idPeriodico);
                    $('#formEdit input[name="nombre"]').val(json.nombre);
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