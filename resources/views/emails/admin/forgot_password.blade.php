<html>
<head></head>
<body style="background: black; color: white">
<p>Dear , {{$name}}</p>

Click here to reset your password: {{ url('admin/password/reset/'.$token) }}
</body>
</html>		