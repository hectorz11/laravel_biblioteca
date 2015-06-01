<head>	
	<!-- Bootstrap core CSS
	  ================================================== -->
    <link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/carousel.css') }}" type="text/css">
    <script type="text/javascript" src="{{ URL::asset('/assets/js/jquery-2.1.0.min.js') }}"></script>
</head>

<div class="navbar-wrapper">
<div class="container">
<nav class="navbar navbar-inverse navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
		    </button>
          	<a class="navbar-brand" href="#">Archivo Regional Tacna</a>
        </div>
	  	<div id="navbar" class="navbar-collapse collapse">
	        <ul class="nav navbar-nav">
		        <li class="active"><a href="{{ URL::route('/') }}"><i class="glyphicon glyphicon-home"></i></a></li>
		        <li><a href="#about"><i class="glyphicon glyphicon-th-large"></i></a></li>
		        <li><a href="#contact"><i class="glyphicon glyphicon-envelope"></i></a></li>
		        <li class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-book"></i> Biblioteca <span class="caret"></span></a>
			        <ul class="dropdown-menu" role="menu">
			            <li><a href="{{ URL::route('biblioteca') }}">Consultar Libro</a></li>
			            <li><a href="{{ URL::route('libro_search') }}">Buscar Libro</a></li>
			        <?php
			        	$user = Sentry::getUser();
			        	$users = Sentry::findGroupByName('user');
			        	$admins = Sentry::findGroupByName('admin');
			        ?>
			        @if(Sentry::check())
			        	@if($user->inGroup($admins))
			           	<li class="divider"></li>
			            <li class="dropdown-header">User</li>
			            <li><a href="{{ URL::route('libro_create') }}">Ingresar Libro</a></li>
			            <li><a href="#">Reporte Completo de Libros</a></li>
			        	@endif
			        @endif
			        </ul>
		        </li>
		        <li class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-file"></i> Hemeroteca <span class="caret"></span></a>
			        <ul class="dropdown-menu" role="menu">
			            <li><a href="{{ URL::route('hemeroteca') }}">Consultar Periodico</a></li>
			            <li><a href="{{ URL::route('periodico_search') }}">Buscar Periodico</a></li>
			        @if(Sentry::check())
			        	@if($user->inGroup($admins))
			           	<li class="divider"></li>
			            <li class="dropdown-header">User</li>
			            <li><a href="{{ URL::route('periodico_create') }}">Ingresar Periodico</a></li>
			            <li><a href="#">Reporte Completo de Periodicos</a></li>
			            @endif
			        @endif
			        </ul>
		        </li>
		        @if(Sentry::check())
		        <li><a href="#"><i class="glyphicon glyphicon-comment"></i> Sugerencias</a></li>
		        <li><a href="{{ URL::route('logout') }}"><i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
		        @endif
	        </ul>
	        <div id="navbar" class="navbar-collapse collapse">
	        @if(Sentry::check())

	        @else
	        	{{ Form::open(array('route' => 'login_post')) }}
		        <div class="navbar-form navbar-right">
		            <div class="form-group">
		              	<input type="text" placeholder="Email" class="form-control" name="email">
		            </div>
		            <div class="form-group">
		              	<input type="password" placeholder="Password" class="form-control" name="password">
		            </div>

		            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-log-in"></i></button>
		        </div>
		        {{ Form::close() }}
		    @endif
        	</div><!--/.navbar-collapse -->
	    </div>
   	</div>
</nav>
</div>
</div>