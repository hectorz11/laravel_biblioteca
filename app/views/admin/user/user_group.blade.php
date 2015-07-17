@extends('base')

@section('contenido')
<br>
<!-- model de Editar datos del Usuario -->
    <div class="container">
        <div class="">
            <!-- Formulario -->
            <form role="form" action="{{ URL::route('admin_user_asignar_group_post', $user->id) }}" method="post" id="formEdit">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Nombre(s)</label>
                            {{ Form::text('first_name', $user->first_name, ['class' => 'form-control']) }}
                        </div>
                        <div class="col-md-6">
                            <label>Apellidos</label>
                            {{ Form::text('last_name', $user->last_name, ['class' => 'form-control']) }}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Grupos</label>
                            @foreach($groups as $group)
                            <ul>
                                {{ Form::checkBox('groups[]', $group->id, User::grupo($group->id, $user->id)) }} 
                                <label>{{ $group->name }}</label>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div><br>
                <input type="hidden" name="idUser">
                <input id="val" type="hidden" name="user" class="input-block-level" value="">
                <div class="">
                    <a href="{{ URL::route('/') }}" class="btn btn-default" data-dismiss="modal">
                        <i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="glyphicon glyphicon-check"></i> Aceptar</button>
                </div>
            </form>
            <!-- fin del formulario -->
        </div>
    </div>
<!-- end modal -->
@stop