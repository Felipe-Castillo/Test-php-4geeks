<html>
<head></head>
<body>
<p>Dear , {{$first_name}}</p>

<p>Sus credenciales de acceso están abajo:

Email : {{$email}}
Contraseña:  {{$password}}
</p>

<br/><br/><br/>
Gracias y Saludos,<br/>
{{ config('app.name') }}
</body>
</html>		
