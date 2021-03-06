@extends('base')

@section('contenido')
<br>
<link href="{{ URL::asset('/assets/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
<div class="col-md-12">
    <table class="table table-striped table-bordered table-hover" id="tablaUsuarios">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Correo Electrónico</th>
                <th>Fecha de Creación</th>
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
            </tr>
        </tbody>
    </table>
    <div class="form-actions" align="center">
        <a href="{{ URL::route('/') }}" class="btn btn-lg btn-primary" name="ingresar">
            <i class="glyphicon glyphicon-plus-sign"></i> Ingresar Nuevo Registro
        </a> 
        <a href="{{ URL::route('/') }}" class="btn btn-lg btn-danger">
            <i class="glyphicon glyphicon-home"></i> Regresar al Menu Principal
        </a>
    </div>
</div>

<!-- model de Editar datos del Usuario -->
<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                <i class="glyphicon glyphicon-share"></i> Editar Usuario<br>
                <span id="load"><center><img src="{{ asset('img/loading1.gif')}}"> Cargando...</center></span></h4>
            </div>
            <div class="modal-body">
                <!-- Formulario -->
                {{ Form::open(['route' => 'admin_user_update_post', 'id' => 'formEdit']) }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <label>Nombre(s)</label>
                                {{ Form::text('first_name', Input::old('first_name'), ['class' => 'form-control']) }}
                            </div>
                            <div class="col-md-6">
                                <label>Apellidos</label>
                                {{ Form::text('last_name', Input::old('last_name'), ['class' => 'form-control']) }}
                            </div>
                            <div class="col-md-6">
                            <label>Correo Electrónico</label>
                            {{ Form::text('email', Input::old('email'), ['class' => 'form-control']) }}
                            </div>
                            @if( $errors->has('nombre') )
                                <div class="alert alert-danger">
                                    @foreach($errors->get('nombre') as $error)
                                        * {{$error}}</br>
                                    @endforeach
                                </div>
                            @endif<br>
                            <div class="col-md-6">
                                <label>Activarcion (coloque 'false' = desactivar o 'true' = activar cuenta)</label>
                                {{ Form::text('activated', Input::old('activated'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div><br>
                    {{ Form::hidden('idUser') }}
                    {{ Form::hidden('user', '', ['id' => 'val']) }}
                    <div class="">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="glyphicon glyphicon-check"></i> Editar</button>
                    </div>
                {{ Form::close() }}
                <!-- fin del formulario -->
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<script src="{{ URL::asset('/assets/js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dataTables/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('/assets/plugins/dataTables/dataTables.bootstrap.js') }}"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        event.preventDefault()
        $('#tablaUsuarios').dataTable({
            "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 4 ]},{ "bVisible": false, "aTargets": [0] }],
            "displayLength":10,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '/admin/datatable/users',
        });

        $("#tablaUsuarios").on("click", ".edit", function(e){
            $('[name=user]').val($(this).attr ('id'));
            var faction = "<?php echo URL::to('/admin/data/user'); ?>";
            var fdata = $('#val').serialize();
            $('#load').show();
            $.get(faction, fdata, function(json) {
                if (json.success) {
                    $('#formEdit input[name="idUser"]').val(json.idUser);
                    $('#formEdit input[name="first_name"]').val(json.first_name);
                    $('#formEdit input[name="last_name"]').val(json.last_name);
                    $('#formEdit input[name="email"]').val(json.email);
                    $('#formEdit input[name="activated"]').val(json.activated);
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