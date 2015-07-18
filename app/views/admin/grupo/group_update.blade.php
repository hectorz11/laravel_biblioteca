@extends('base')

@section('contenido')
<br>
<div class="container">
    <div class="col-md-12">
        {{ Form::open(['route' => ['admin_group_update_post', $group->id]]) }}
            <div class="row">
                <div class="col-md-3">
                    <label>Nombre del Grupo</label>
                </div>
                <div class="col-md-9">
                    {{ Form::text('name', $group->name, ['class' => 'form-control']) }}
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-12">
                    @foreach($group->getPermissions() as $name => $activated)
                    <ul>{{ $name }} = {{ Form::text($name, $activated) }}</ul>
                    @endforeach
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ URL::route('/') }}" class="btn btn-default" data-dismiss="modal">
                        <i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="glyphicon glyphicon-check"></i> Aceptar</button>
                </div>
            </div>
        {{ Form::close() }}
        <div class="form-actions" align="center">
            <a href="{{ URL::route('libro_create') }}" class="btn btn-lg btn-primary" name="ingresar">
                <i class="glyphicon glyphicon-plus-sign"></i> Ingresar Nuevo Registro
            </a> 
            <a href="{{ URL::route('/') }}" class="btn btn-lg btn-danger">
                <i class="glyphicon glyphicon-home"></i> Regresar al Menu Principal
            </a>
        </div>
    </div>
</div>
@stop