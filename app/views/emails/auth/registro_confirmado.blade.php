<meta charset="utf-8" />
  
<h2>Bienvenido</h2>
<br>
<b>Cuenta:</b> {{ $email }}
<b>Contraseña:</b> {{ $password }}
<br>
Para activar su cuenta haga
<a href="{{ URL::to('registro') }}/{{ $userId }}/activacion/{{ urlencode($activationCode) }}"> click aqui.</a>
<br> 
O apuntar su navegador a esta dirección:
{{ URL::to('registro') }}/{{ $userId }}/activacion/{{ urlencode($activationCode) }}
<br>
Gracias
<br>
    ~The Support Team Redaventura.