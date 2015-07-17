@extends('base')

@section('contenido')
<div class="container">
    <div class="col-md-12">
        @if(Session::has('mensaje'))
        <div class="alert alert-{{ Session::get('class') }}">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="close" data-dismiss="alert">×</button>
        </div>
        @endif
        <h3>Ingrese el Grupo</h3><br>
        {{ Form::open(array('route' => 'admin_group_create_post')) }}
            <div class="row">
                <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Nombre:</label></div>
                <div class="col-md-10 col-xs-15 col-sm-10">
                    {{ Form::text('name', Input::old('name'), ['class' => 'form-control']) }}
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-2 col-xs-3 col-sm-2"><label class="control-label"> Permisos:</label></div>
            </div>
            <div class="row">
                <div class="col-md-3 col-xs-4 col-sm-3">
                    <div class="col-md-2">{{ Form::checkBox('admin', 1) }}</div>
                    <div class="col-md-10">Administrador</div>
                </div>
            </div><hr>
            <div class="row">
                <div class="col-md-3 col-xs-4 col-sm-3">
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('grupo', 1) }}</div>
                        <div class="col-md-10">Grupos</div>  
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('grupo_create', 1) }}</div>
                        <div class="col-md-10">Grupo - Crear</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('grupo_update', 1) }}</div>
                        <div class="col-md-10">Grupo - Editar</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('grupo_delete', 1) }}</div>
                        <div class="col-md-10">Grupo - Eliminar</div> 
                    </div><hr>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('usuario', 1) }}</div>
                        <div class="col-md-10">Usuarios</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('usuario_create', 1) }}</div>
                        <div class="col-md-10">Usuario - Crear</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('usuario_update', 1) }}</div>
                        <div class="col-md-10">Usuario - Editar</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('usuario_delete', 1) }}</div>
                        <div class="col-md-10">Usuario - Eliminar</div>
                    </div><hr>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('comentario', 1) }}</div>
                        <div class="col-md-10">Comentarios</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('comentario_create', 1) }}</div>
                        <div class="col-md-10">Comentario - Crear</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('comentario_update', 1) }}</div>
                        <div class="col-md-10">Comentario - Editar</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('comentario_delete', 1) }}</div>
                        <div class="col-md-10">Comentario - Eliminar</div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-4 col-sm-3">
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('libro', 1) }}</div>
                        <div class="col-md-10">Biblioteca</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('libro_create', 1) }}</div>
                        <div class="col-md-10">Libro - Crear</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('libro_update', 1) }}</div>
                        <div class="col-md-10">Libro - Editar</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('libro_delete', 1) }}</div>
                        <div class="col-md-10">Libro - Eliminar</div>
                    </div><hr>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('periodico', 1) }}</div>
                        <div class="col-md-10">Hemeroteca</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('periodico_create', 1) }}</div>
                        <div class="col-md-10">Periodico - Crear</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('periodico_update', 1) }}</div>
                        <div class="col-md-10">Periodico - Editar</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('periodico_delete', 1) }}</div>
                        <div class="col-md-10">Periodico - Eliminar</div>
                    </div><hr>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('clasificacion', 1) }}</div>
                        <div class="col-md-10">Clasificaciones</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('clasificacion_create', 1) }}</div>
                        <div class="col-md-10">Clasificación - Crear</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('clasificacion_update', 1) }}</div>
                        <div class="col-md-10">Clasificación - Editar</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('clasificacion_delete', 1) }}</div>
                        <div class="col-md-10">Clasificación - Eliminar</div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-4 col-sm-3">
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('estado', 1) }}</div>
                        <div class="col-md-10">Estados</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('estado_create', 1) }}</div>
                        <div class="col-md-10">Estado - Crear</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('estado_update', 1) }}</div>
                        <div class="col-md-10">Estado - Editar</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('estado_delete', 1) }}</div>
                        <div class="col-md-10">Estado - Eliminar</div>
                    </div><hr>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('tipo', 1) }}</div>
                        <div class="col-md-10">Tipos</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('tipo_create', 1) }}</div>
                        <div class="col-md-10">Tipo - Crear</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('tipo_update', 1) }}</div>
                        <div class="col-md-10">Tipo - Editar</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('tipo_delete', 1) }}</div>
                        <div class="col-md-10">Tipo - Eliminar</div>
                    </div><hr>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('ubicacion', 1) }}</div>
                        <div class="col-md-10">Ubicaciones</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('ubicacion_create', 1) }}</div>
                        <div class="col-md-10">Ubicación - Crear</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('ubicacion_update', 1) }}</div>
                        <div class="col-md-10">Ubicación - Editar</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('ubicacion_delete', 1) }}</div>
                        <div class="col-md-10">Ubicación - Eliminar</div>
                    </div>
                </div>
                <div class="col-md-3 col-xs-3 col-sm-3">
                    
                </div>
                <div class="col-md-2 col-sm-2"></div>
            </div><br>
            <div class="form-actions" align="center">
                <button type="submit" class="btn btn-lg btn-primary">
                    <i class="glyphicon glyphicon-floppy-saved"></i> Confirmar</button>
                <a href="{{ URL::route('admin_groups') }}" class="btn btn-lg btn-danger">
                    <i class="glyphicon glyphicon-floppy-remove"></i> Cancelar</a>
            </div>
        {{ Form::close() }}
    </div>
</div>
@stop