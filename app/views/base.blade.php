<html>

{{ HTML::style('/bootstrap/css/bootstrap.css') }}
{{ HTML::style('/bootstrap/css/bootstrapmin.css') }}
{{ HTML::style('/bootstrap/css/carousel.css') }}
{{ HTML::script('/jquery/jquery-1.10.1.js') }}
{{ HTML::script('/bootstrap/js/bootstrap.min.js' )}}

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Archivo Historico de Tacna : Biblioteca y Hemeroteca</title>
</head>
<body>
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
		        <li class="active"><a href="{{ URL::route('/') }}">Home</a></li>
		        <li><a href="#about">About</a></li>
		        <li><a href="#contact">Contact</a></li>
		        <li class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Biblioteca <span class="caret"></span></a>
			        <ul class="dropdown-menu" role="menu">
			            <li><a href="{{ URL::route('biblioteca') }}">Consultar Libro</a></li>
			            <li><a href="{{ URL::route('libro_search') }}">Buscar Libro</a></li>
			           	<li class="divider"></li>
			            <li class="dropdown-header">User</li>
			            <li><a href="{{ URL::route('libro_create') }}">Ingresar Libro</a></li>
			            <li><a href="#">Reporte Completo de Libros</a></li>
			        </ul>
		        </li>
		        <li class="dropdown">
			        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Hemeroteca <span class="caret"></span></a>
			        <ul class="dropdown-menu" role="menu">
			            <li><a href="{{ URL::route('hemeroteca') }}">Consultar Periodico</a></li>
			            <li><a href="{{ URL::route('periodico_search') }}">Buscar Periodico</a></li>
			           	<li class="divider"></li>
			            <li class="dropdown-header">User</li>
			            <li><a href="{{ URL::route('periodico_create') }}">Ingresar Periodico</a></li>
			            <li><a href="#">Reporte Completo de Periodicos</a></li>
			        </ul>
		        </li>
	        </ul>
	        <div id="navbar" class="navbar-collapse collapse">
		        <form class="navbar-form navbar-right">
		            <div class="form-group">
		              	<input type="text" placeholder="Email" class="form-control">
		            </div>
		            <div class="form-group">
		              	<input type="password" placeholder="Password" class="form-control">
		            </div>
		            <button type="submit" class="btn btn-success">Sign in</button>
		        </form>
        	</div><!--/.navbar-collapse -->
	    </div>
   	</div>
</nav>
</div>
</div>
<nav style="background: white">
	@yield('contenido')
</nav>
<div align="center">
	<p><br>Archivo Regional de Tacna - Calle Zela Nro 716 Tacna - Peru. Todos los derechos reservados.<br></p>
</div>
</body>