@extends('base')

@section('contenido')
<!-- Carousel
    ================================================== -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
          	<img class="first-slide" src="/imagenes/imagen1.jpg" alt="First slide">
          	<div class="container">
            	<div class="carousel-caption">
              		<h1>Example headline.</h1>
              		<p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
              		<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            	</div>
          	</div>
        </div>
        <div class="item">
          	<img class="second-slide" src="/imagenes/imagen2.jpg" alt="Second slide">
          	<div class="container">
            	<div class="carousel-caption">
              		<h1>Another example headline.</h1>
              		<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              		<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            	</div>
          	</div>
        </div>
        <div class="item">
          	<img class="third-slide" src="/imagenes/imagen3.jpg" alt="Third slide">
          	<div class="container">
            	<div class="carousel-caption">
              		<h1>One more for good measure.</h1>
              		<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              		<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            	</div>
          	</div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
       	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->

<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
	        <img class="img-circle" src="/imagenes/imagen1.jpg" alt="Generic placeholder image" width="140" height="140">
	        <h2>Heading</h2>
	        <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
	        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          	<img class="img-circle" src="/imagenes/imagen2.jpg" alt="Generic placeholder image" width="140" height="140">
          	<h2>Heading</h2>
          	<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          	<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          	<img class="img-circle" src="/imagenes/imagen3.jpg" alt="Generic placeholder image" width="140" height="140">
          	<h2>Heading</h2>
          	<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          	<p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>
@if(!Sentry::check())
<div class="jumbotron">
	<div class="container">
		<div class="col-md-8">
	    	<h1 >Archivo Regional Tacna, Catálogo de Material Bibliográfico </h1>
		</div>
		<div class="col-md-4">
			{{ Form::open(array('route' => 'register_post')) }}
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				  {{ Form::text('username', Input::old('username'), ['class' => 'form-control', 'placeholder' => 'Username']) }}
        </div>
				<br>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				  {{ Form::email('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'example@example.com']) }}
        </div>
				<br>
        <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				  <input type="password" name="password" class="form-control" placeholder="Create a password">
        </div>
        {{ Form::hidden('tipo', 'user') }}
        <br>
        <button class="btn btn-success btn-lg" type="submit">Registrate</button>
      {{ Form::close() }}
			</form>
	 		<p><a class="btn btn-primary btn-sm" href="https://www.facebook.com/pages/Archivo-Regional-de-Tacna/275688885934938?fref=ts" role="button">Siguenos &raquo;</a></p>
	 	</div>
    </div>
</div>
@endif
@stop