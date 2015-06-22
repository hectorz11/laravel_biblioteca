@extends('base')

@section('contenido')
<br>
<link href="{{ URL::asset('/assets/plugins/dataTables/dataTables.bootstrap.css') }}" rel="stylesheet">
<div class="container">
    <table class="table table-striped table-bordered table-hover" id="tablaLibros">
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
                    <a href="{{ URL::to('#Eliminar') }}">Eliminar</a>
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
<div class="modal fade" id="Eliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                <i class="glyphicon glyphicon-share"></i> Eliminar Libro<br>
                <span id="load"><center><img src="{{ asset('img/loading1.gif')}}"> Cargando...</center></span></h4>
            </div>
            <div class="modal-body">
                <!-- Formulario -->
                <form role="form" action="{{ URL::route('libro_delete_post')}}" method="post" id="formEdit">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Titulo del Libro a eliminar</label>
                            {{ Form::text('titulo', Input::old('titulo'), ['class' => 'form-control']) }}
                        </div>
                    </div><br>
                    <input type="hidden" name="idLibro">
                    <input id="val" type="hidden" name="libro" class="input-block-level" value="">
                    <div class="">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="glyphicon glyphicon-check"></i> Eliminar</button>
                    </div>
                </form>
            </div>
            <!--  -->
        </div>
    </div>
</div>
@stop