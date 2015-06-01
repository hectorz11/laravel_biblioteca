<html>
<head>	
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema de Gestión Académica y de Seguimiento de Egresados">
    <meta name="keywords" content="esmesigae">
    <meta name="author" content="esmesigae, Noveltie Company SAC">
	
	<!-- Bootstrap core CSS
	  ================================================== -->
    <link href="{{ URL::asset('/assets/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/bootstrap.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/carousel.css') }}" type="text/css">
    <script type="text/javascript" src="{{ URL::asset('/assets/js/jquery-2.1.0.min.js') }}"></script>
</head>
<body class="page-homepage-carousel">

	<header class="site-header">
		@include('page.header')
	</header>
	<div id="page-content">
			@yield('contenido')
	</div>
	<footer align="center">
		<p><br>Archivo Regional de Tacna - Calle Zela Nro 716 Tacna - Peru. Todos los derechos reservados.<br></p>
		<section id="footer-top">
	        <div class="container">
	            <div class="footer-inner">
	                <div class="footer-social">
	                    <figure>Siguenos en:</figure>
	                    <div class="icons">
	                        <a href="members.html"><i class="fa fa-twitter"></i></a>
	                        <a href="members.html"><i class="fa fa-facebook"></i></a>
	                        <a href="members.html"><i class="fa fa-pinterest"></i></a>
	                        <a href="members.html"><i class="fa fa-youtube-play"></i></a>
	                    </div><!-- /.icons -->
	                </div><!-- /.social -->
	            </div><!-- /.footer-inner -->
	        </div><!-- /.container -->
	    </section><!-- /#footer-top -->
	</footer>
	<script type="text/javascript" src="{{ URL::asset('/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>