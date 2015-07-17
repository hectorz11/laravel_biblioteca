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
                <div class="col-md-2 col-xs-3 col-sm-2">
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('admin', Input::old('admin', 1)) }}</div>
                        <div class="col-md-10">Administrador</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('grupo', Input::old('grupo', 1)) }}</div>
                        <div class="col-md-10">Grupos</div>  
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('grupo.create', Input::old('grupo.create', 1)) }}</div>
                        <div class="col-md-10">Grupo - Crear</div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">{{ Form::checkBox('grupo.update', Input::old('grupo.update', 1)) }}</div>
                        <div class="col-md-10">Grupo - Editar</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Grupo - Eliminar</div>
                        <div class="col-md-2">{{ Form::checkBox('grupo.delete', Input::old('grupo.delete', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Usuarios</div>
                        <div class="col-md-2">{{ Form::checkBox('user', Input::old('user', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Usuario - Crear</div>
                        <div class="col-md-2">{{ Form::checkBox('user.create', Input::old('user.create', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Usuario - Editar</div>
                        <div class="col-md-2">{{ Form::checkBox('user.update', Input::old('user.update', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Usuario - Eliminar</div>
                        <div class="col-md-2">{{ Form::checkBox('user.delete', Input::old('user.delete', 1)) }}</div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-3 col-sm-2">
                    <div class="row">
                        <div class="col-md-10">Biblioteca</div>
                        <div class="col-md-2">{{ Form::checkBox('libro', Input::old('libro', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Libro - Crear</div>
                        <div class="col-md-2">{{ Form::checkBox('libro.create', Input::old('libro.create', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Libro - Editar</div>
                        <div class="col-md-2">{{ Form::checkBox('libro.update', Input::old('libro.update', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Libro - Eliminar</div>
                        <div class="col-md-2">{{ Form::checkBox('libro.delete', Input::old('libro.delete', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Hemeroteca</div>
                        <div class="col-md-2">{{ Form::checkBox('periodico', Input::old('periodico', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Periodico - Crear</div>
                        <div class="col-md-2">{{ Form::checkBox('periodico.create', Input::old('periodico.create', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Periodico - Editar</div>
                        <div class="col-md-2">{{ Form::checkBox('periodico.update', Input::old('periodico.update', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Periodico - Eliminar</div>
                        <div class="col-md-2">{{ Form::checkBox('periodico.delete', Input::old('periodico.delete', 1)) }}</div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-3 col-sm-2">
                    <div class="row">
                        <div class="col-md-10">Clasificaciones</div>
                        <div class="col-md-2">{{ Form::checkBox('clasificacion', Input::old('clasificacion', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Clasificación - Crear</div>
                        <div class="col-md-2">{{ Form::checkBox('clasificacion.create', Input::old('clasificacion.create', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Clasificación - Editar</div>
                        <div class="col-md-2">{{ Form::checkBox('clasificacion.update', Input::old('clasificacion.update', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Clasificación - Eliminar</div>
                        <div class="col-md-2">{{ Form::checkBox('clasificacion.delete', Input::old('clasificacion.delete', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Estados</div>
                        <div class="col-md-2">{{ Form::checkBox('estado', Input::old('estado', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Estado - Crear</div>
                        <div class="col-md-2">{{ Form::checkBox('estado.create', Input::old('estado.create', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Estado - Editar</div>
                        <div class="col-md-2">{{ Form::checkBox('estado.update', Input::old('estado.update', 1)) }}</div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-3 col-sm-2">
                    <div class="row">
                        <div class="col-md-10">Estado - Eliminar</div>
                        <div class="col-md-2">{{ Form::checkBox('estado.delete', Input::old('estado.delete', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Tipos</div>
                        <div class="col-md-2">{{ Form::checkBox('tipo', Input::old('tipo', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Tipo - Crear</div>
                        <div class="col-md-2">{{ Form::checkBox('tipo.create', Input::old('tipo.create', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Tipo - Editar</div>
                        <div class="col-md-2">{{ Form::checkBox('tipo.update', Input::old('tipo.update', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Tipo - Eliminar</div>
                        <div class="col-md-2">{{ Form::checkBox('tipo.delete', Input::old('tipo.delete', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Ubicaciones</div>
                        <div class="col-md-2">{{ Form::checkBox('ubicacion', Input::old('ubicacion', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Ubicación - Crear</div>
                        <div class="col-md-2">{{ Form::checkBox('ubicacion.create', Input::old('ubicacion.create', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Ubicación - Editar</div>
                        <div class="col-md-2">{{ Form::checkBox('ubicacion.update', Input::old('ubicacion.update', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Ubicación - Eliminar</div>
                        <div class="col-md-2">{{ Form::checkBox('ubicacion.delete', Input::old('ubicacion.delete', 1)) }}</div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-3 col-sm-2">
                    <div class="row">
                        <div class="col-md-10">Comentarios</div>
                        <div class="col-md-2">{{ Form::checkBox('comentario', Input::old('comentario', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Comentario - Crear</div>
                        <div class="col-md-2">{{ Form::checkBox('comentario.create', Input::old('comentario.create', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Comentario - Editar</div>
                        <div class="col-md-2">{{ Form::checkBox('comentario.update', Input::old('comentario.update', 1)) }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">Comentario - Eliminar</div>
                        <div class="col-md-2">{{ Form::checkBox('comentario.delete', Input::old('comentario.delete', 1)) }}</div>
                    </div>
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