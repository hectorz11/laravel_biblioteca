@extends('base')

@section('contenido')
<br>
<link href="{{ URL::asset('/assets/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
<div class="container">
    <table class="table table-striped table-bordered table-hover" id="tablaComentarios">
        <thead>
            <tr>
                <th>ID</th>
                <th>Comentario</th>
                <th>Operaciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($user->comentarios as $comentario)
            <tr>
                <td>{{ $comentario->id }}</td>
                <td>{{ $comentario->descripcion }}</td>
                <td>
                    <a data-toggle="modal" data-target="#Editar" class="edit" id="{{ $comentario->id }}">
                        <i class="glyphicon glyphicon-edit"></i> Editar</a><br>
                    <a data-toggle="modal" data-target="#Eliminar" class="delete" id="{{ $comentario->id }}">
                        <i class="glyphicon glyphicon-remove-circle"></i> Eliminar</a><br>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="form-actions" align="center">
        <a href="{{ URL::route('comentario_create') }}" class="btn btn-lg btn-primary" name="ingresar">
            <i class="glyphicon glyphicon-plus-sign"></i> Ingresar Nuevo Registro
        </a> 
        <a href="{{ URL::route('/') }}" class="btn btn-lg btn-danger">
            <i class="glyphicon glyphicon-home"></i> Regresar al Menu Principal
        </a>
    </div>
</div>
<!-- Modal Editar Comentario -->
<div class="modal fade" id="Editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                <i class="glyphicon glyphicon-share"></i> Editar Comentario<br>
            </div>
            <div class="modal-body">
                <form role="form" action="{{ URL::route('libro_delete_post')}}" method="post" id="formEdit">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Comentario</label>
                            {{ Form::text('description', Input::old('description'), ['class' => 'form-control']) }}
                        </div>
                    </div><br>
                    <input type="hidden" name="idComentario">
                    <input id="val" type="hidden" name="comentario" class="input-block-level" value="">
                    <div class="">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="glyphicon glyphicon-check"></i> Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Editar Comentario -->
<!-- Modal Eliminar Comentario -->
<div class="modal fade" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                <i class="glyphicon glyphicon-share"></i> Eliminar Comentario<br>
            </div>
            <div class="modal-body">
                <form role="form" action="{{ URL::route('/')}}" method="post" id="formEdit">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Comentario</label>
                            {{ Form::text('description', Input::old('description'), ['class' => 'form-control']) }}
                        </div>
                    </div><br>
                    <input type="hidden" name="idComentario">
                    <input id="val" type="hidden" name="comentario" class="input-block-level" value="">
                    <div class="">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="glyphicon glyphicon-check"></i> Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Eliminar Comentario -->

<script>
    $(document).ready(function() {
        event.preventDefault()

        $("#tablaComentarios").on("click", ".edit", function(e) {
            $('[name=comentario]').val($(this).attr ('id'));
            var faction = "<?php echo URL::to('/user/data/comentario'); ?>";
            var fdata = $('#val').serialize();
            $('#load').show();
            $.get(faction, fdata, function(json) {
                if (json.success) {
                    $('#formEdit input[name="idComentario"]').val(json.idComentario);
                    $('#formEdit input[name="description"]').val(json.comentario);
                    $('#load').hide();
                } else {
                    $('#errorMessage').html(json.message);
                    $('#errorMessage').show();
                }
            });
        });

        $("#tablaComentarios").on("click", ".delete", function(e) {
            $('[name=comentario]').val($(this).attr ('id'));
            var faction = "<?php echo URL::to('/user/data/comentario'); ?>";
            var fdata = $('#val').serialize();
            $('#load').show();
            $.get(faction, fdata, function(json) {
                if (json.success) {
                    $('#formEdit input[name="idComentario"]').val(json.idComentario);
                    $('#formEdit input[name="description"]').val(json.comentario);
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