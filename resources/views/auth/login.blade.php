<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   

<form action="{{route('login')}}" method="POST">
    @csrf
<label for="">Correo electronico</label>
<input type="email" name="email" id="email">
<label for="">Contraseña</label>
<input type="password" name="password" id="password">
<button type="submit">Iniciar sesion</button>
</form>

</body>
</html>