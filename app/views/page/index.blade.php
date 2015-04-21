@extends('base')

@section('contenido')
<div class="hero-unit">
 	<h1 align="center">Catálogo de Material Bibliográfico</h1><br>
 	<h4 align="center">¿Qué desea hacer?</h4>
  	<br>
  	<!--LISTA DE PESTAÑAS DE LA TABLITA :D-->
	<div class="tabbable tabs-left"> <!-- Only required for left/right tabs -->
	 	<ul class="nav nav-tabs">
	    	<li class="active"><a href="#tab1" data-toggle="tab"><i class="icon-book"></i> Catálogo de Biblioteca</a></li>
	    	<li><a href="#tab2" data-toggle="tab"><i class="icon-book"></i> Catálogo de Periódicos</a></li>
	  	</ul>
	 	<div class="tab-content">
	    	<div class="tab-pane active" id="tab1">
	      		<div align="center">
					<a class="btn btn-success btn-large" href="{{ URL::route('libro_create') }}"><i class="icon-pencil icon-white"></i> Ingresar Libro</a>
					<a class="btn btn-primary btn-large" href="{{ URL::route('biblioteca') }}"><i class="icon-search icon-white"></i> Consultar Libros</a>
					<a class="btn btn-inverse btn-large" href="#"><i class="icon-search icon-white"></i> Buscar Libros</a>
					<a class="btn btn-danger btn-large" href="#"><i class="icon-search icon-white"></i> Reporte Completo de Libros</a>
				</div>
	    	</div>
	    	<div class="tab-pane" id="tab2">
	      		<div align="center">
	      			<!--MODAL DE POP UP PARA PRESENTACION DE PERIODICOS-->
	      			<a href="#myModal" role="button" class="btn btn-large btn-info" data-toggle="modal"><i class="icon-globe icon-white"></i> Presentación de la Hemeroteca <i class="icon-globe icon-white"></i></a>
					<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  	<div class="modal-header">
						    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						    <h3 id="myModalLabel">Presentación</h3>
					  	</div>
					  	<div class="modal-body">
					    	<p>El Archivo Regional de Tacna pone a su consideración, amable usuario, el Catálogo de Periódicos y Revistas Editadas en Tacna. En el encontraremos diarios como <B>"EL MENSAJERO DE TACNA"</B>, primer periódico que circuló en nuestra cuidad y cuya edición inicial saliera a la luz del día 1 de Febrero de 1840.</p>
					    	<p>Asi también encontrará periódicos como el <B>"EL FARO"</B>, <B>"EL INNOVADOR"</B>, <B>"EL TACORA"</B>, <B>"LA VOZ DE TACNA"</B>, asi como muchos otros periódicos, hasta la actualidad, sin mas preámbulo, <B>sea Usted Bienvenido</B>.</p>
					  	</div>
					  	<div class="modal-footer">
					    	<button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cerrar</button>
					    	<!--button class="btn btn-primary">Save changes</button-->
					  	</div>
					</div><br><br>
	      			<!--AQUI TERMINA LA PRESENTACION-->
					<a class="btn btn-success btn-large" href="#"><i class="icon-pencil icon-white"></i> Ingresar Periódico</a>
					<a class="btn btn-primary btn-large" href="{{ URL::route('hemeroteca') }}"><i class="icon-search icon-white"></i> Consultar Periódicos</a>
					<a class="btn btn-inverse btn-large" href="#"><i class="icon-search icon-white"></i> Buscar Periódicos</a>
					<a class="btn btn-danger btn-large" href="#"><i class="icon-search icon-white"></i> Reporte Completo de Periódicos</a>
				</div>
	    	</div>
	  	</div>
	</div>
</div>
@stop