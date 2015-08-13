<head>	
	<!-- Bootstrap core CSS
	  ================================================== -->
    <!--<link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/carousel.css') }}" type="text/css">-->
    <script type="text/javascript" src="{{ URL::asset('/assets/js/jquery-2.1.0.min.js') }}"></script>
</head>

<div class="navbar-wrapper">
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
		    </button>
          	<a class="navbar-brand" href="#ART">Archivo Regional Tacna</a>
        </div>
	  	<div id="navbar" class="navbar-collapse collapse">
	        <ul class="nav navbar-nav">
				<li class="active"><a href="{{ URL::route('/') }}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
				<li><a href="#about"><i class="glyphicon glyphicon-th-large"></i> About</a></li>
				<li><a href="#contact"><i class="glyphicon glyphicon-envelope"></i> Contact</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<i class="glyphicon glyphicon-book"></i> Biblioteca <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ URL::route('libro_search') }}"><i class="glyphicon glyphicon-question-sign"></i> Buscar Libro</a></li>
				@if (Sentry::check())
						<li class="divider"></li>
						<li class="dropdown-header">Archivo Regional Tacna</li>
					@if (Sentry::getUser()->hasAccess(['admin','libro']))
						<li><a href="{{ URL::route('admin_libro_create') }}"><i class="glyphicon glyphicon-plus-sign"></i> Ingresar Libro</a></li>
						<li><a href="{{ URL::route('admin_biblioteca') }}"><i class="glyphicon glyphicon-ok-sign"></i> Consultar Libro</a></li>
						<li><a href="{{ URL::route('admin_biblioteca_no') }}"><i class="glyphicon glyphicon-remove-sign"></i> Recuperar Libro</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-info-sign"></i> Reporte Completo de Libros</a></li>
					@else
						<li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene Acceso</a></li></li>
					@endif
				@endif
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<i class="glyphicon glyphicon-file"></i> Hemeroteca <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ URL::route('periodico_search') }}"><i class="glyphicon glyphicon-question-sign"></i> Buscar Periodico</a></li>
				@if (Sentry::check())
						<li class="divider"></li>
						<li class="dropdown-header">Archivo Regional Tacna</li>
					@if (Sentry::getUser()->hasAccess(['admin','periodico']))
						<li><a href="{{ URL::route('admin_periodico_create') }}"><i class="glyphicon glyphicon-plus-sign"></i> Ingresar Periodico</a></li>
						<li><a href="{{ URL::route('admin_hemeroteca') }}"><i class="glyphicon glyphicon-ok-sign"></i> Consultar Periodico</a></li>
						<li><a href="{{ URL::route('admin_hemeroteca_no') }}"><i class="glyphicon glyphicon-remove-sign"></i> Recuperar Periodico</a></li>
						<li><a href="#"><i class="glyphicon glyphicon-info-sign"></i> Reporte Completo de Periodicos</a></li>
					@else
						<li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene Acceso</a></li></li>
			    	@endif
				@endif
					</ul>
				</li>
		    @if (Sentry::check())
			    @if (Sentry::getUser()->hasAccess(['admin']))
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<i class="glyphicon glyphicon-th-large"></i> Panel <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li class="dropdown-header">Clasificaciones</li>
					@if (Sentry::getUser()->hasAccess(['clasificacion']))
						<li><a href="{{ URL::route('admin_clasificaciones') }}"><i class="glyphicon glyphicon-question-sign"></i> Consultar</a></li>
					@else
						<li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene Acceso</a></li></li>
					@endif
						<li class="divider"></li>
						<li class="dropdown-header">Estados</li>
					@if (Sentry::getUser()->hasAccess(['estado']))
						<li><a href="{{ URL::route('admin_estados') }}"><i class="glyphicon glyphicon-question-sign"></i> Consultar</a></li>
					@else
						<li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene Acceso</a></li></li>
					@endif
						<li class="divider"></li>
						<li class="dropdown-header">Tipos</li>
					@if (Sentry::getUser()->hasAccess(['tipo']))
						<li><a href="{{ URL::route('admin_tipos') }}"><i class="glyphicon glyphicon-question-sign"></i> Consultar</a></li>
					@else
						<li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene Acceso</a></li></li>
					@endif
						<li class="divider"></li>
						<li class="dropdown-header">Ubicaciones</li>
					@if (Sentry::getUser()->hasAccess(['ubicacion']))
						<li><a href="{{ URL::route('admin_ubicaciones') }}"><i class="glyphicon glyphicon-question-sign"></i> Consultar</a></li>
					@else
						<li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene Acceso</a></li></li>
					@endif
					</ul>
				</li>
		    	@endif
			@endif
		    @if (Sentry::check())
		    	@if (Sentry::getUser()->hasAccess(['admin']))
		    	<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						<i class="glyphicon glyphicon-th"></i> Administrador <span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li class="dropdown-header">Usuarios</li>
					@if (Sentry::getUser()->hasAccess(['usuario']))
						<li><a href="{{ URL::route('admin_users') }}"><i class="glyphicon glyphicon-user"></i> Usuarios</a></li>
						<li><a href="{{ URL::route('admin_helpers_periodico') }}"><i class="glyphicon glyphicon-user"></i> Colaborador Periodico</a></li>
						<li><a href="{{ URL::route('admin_helpers_libro') }}"><i class="glyphicon glyphicon-user"></i> Coloborador Libro</a></li>
						<li><a href="{{ URL::route('admin_helpers') }}"><i class="glyphicon glyphicon-user"></i> Secretaria</a></li>
					@else
						<li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene Acceso</a></li></li>
					@endif
						<li class="divider"></li>
						<li class="dropdown-header">Grupos</li>
					@if (Sentry::getUser()->hasAccess(['grupo']))
						<li><a href="{{ URL::route('admin_groups') }}"><i class="glyphicon glyphicon-modal-window"></i> Consultar</a></li>
					@else
						<li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene Acceso</a></li></li>
					@endif
						<li class="divider"></li>
						<li class="dropdown-header">Comentarios</li>
					@if (Sentry::getUser()->hasAccess(['comentario']))
						<li><a href="{{ URL::route('admin_comentarios') }}"><i class="glyphicon glyphicon-modal-window"></i> Consultar</a></li>
					@else
						<li><a href="#"><i class="glyphicon glyphicon-minus-sign"></i> No tiene Acceso</a></li></li>
					@endif
					</ul>
				</li>
		    	@endif
				@if (Sentry::getUser()->hasAccess(['user']))
				<li><a href="{{ URL::route('comentarios') }}"><i class="glyphicon glyphicon-comment"></i> Comentarios</a></li>
				@endif
				<li><a href="{{ URL::route('logout') }}"><i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
		    @endif
	        </ul>
	        <div id="navbar" class="navbar-collapse collapse">
	        @if (Sentry::check())
	        	<a class="navbar-brand navbar-right" href="#">{{ Sentry::getUser()->first_name }} {{ Sentry::getUser()->last_name }} --</a>
	        @else
	        	{{ Form::open(array('route' => 'login_post')) }}
				<div class="navbar-form navbar-right">
				    <div class="form-group">
				      	<input type="text" placeholder="Email" class="form-control" name="email">
				    </div>
				    <div class="form-group">
				      	<input type="password" placeholder="Password" class="form-control" name="password">
				    </div>
				    <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-log-in"></i> ingresar</button>
				</div>
				{{ Form::close() }}
		    @endif
        	</div><!--/.navbar-collapse -->
	    </div>
	</nav>
</div>