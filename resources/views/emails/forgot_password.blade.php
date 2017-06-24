<html>
<head></head>
<body>
<p>Dear , {{$name}}</p>

<a href="{{ url('/user/password/reset/'.$token) }}">
haga clic aquí </a> Para restablecer su contraseña:

<br/><br/><br/>
Gracias y Saludos,<br/>
{{ config('app.name') }}

</p>
</body>
</html>		
