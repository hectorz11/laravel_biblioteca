@extends('base')

@section('contenido')
<br><br><br><br>
<div class="container">
    <div class="col-md-12">
        {{ Form::open(['route' => ['admin_periodico_delete_post', $periodico->id]]) }}
        <pre>
            Desea eliminar el siguiente periodico:
            Volumen: {{ $periodico->volumen }}
            Nombre: {{ $periodico->nombre }}
        </pre>
        <div class="form-actions" align="center">
            <input class="btn btn-lg btn-primary" type="submit" value="Confirmar" />
            <a href="{{ URL::route('admin_hemeroteca') }}" class="btn btn-lg btn-danger">Cancelar</a>
        </div>
        {{ Form::close() }}
    </div>
</div>

@stop