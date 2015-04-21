<html>

{{ HTML::style('/bootstrap/css/bootstrap.css') }}
{{ HTML::script('/jquery/jquery-1.10.1.js') }}
{{ HTML::script('/bootstrap/js/bootstrap.min.js' )}}

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Archivo Historico de Tacna : Biblioteca y Hemeroteca</title>
</head>

<body style="background-image:url(imagenes/background.png)">

	<IMG style="position:absolute; TOP:35px; LEFT:170px; WIDTH:75px; HEIGHT:75px" SRC="/imagenes/logogrt.png" >
	<IMG style="position:absolute; TOP:35px; RIGHT:170px; WIDTH:75px; HEIGHT:75px" SRC="/imagenes/logoart.png">
	<div align="center" style="color: #ffffff">	
		<h1><br>Registro Biblioteca y Hemeroteca</h1><br><br>
	</div>

<div style="background: white">
@yield('contenido')
</div>

<div align="center" style="color: #ffffff">
<p><br>Archivo Regional de Tacna - Calle Zela Nro 716 Tacna - Peru. Todos los derechos reservados.<br></p>
</div>
</body>