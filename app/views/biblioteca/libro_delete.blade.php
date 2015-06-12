@extends('base')

@section('contenido')
<br><br><br><br>
<div class="container">
    <div class="col-md-12">
        {{ Form::open(array('route' => array('libro_delete_post', $libro->id))) }}
        <pre>
            Desea eliminar el siguiente libro:
            Codigo: {{ $libro->codigo }}
            Título: {{ $libro->titulo }}
            Autor(es): {{ $libro->autores }}
        </pre>
        <div class="form-actions" align="center">
            <input class="btn btn-lg btn-primary" type="submit" value="Confirmar" />
            <a href="{{ URL::route('biblioteca') }}" class="btn btn-lg btn-danger">Cancelar</a>
        </div>
        {{ Form::close() }}
    </div>
</div>

@stop