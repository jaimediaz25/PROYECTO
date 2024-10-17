<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Inserción</title>
</head>
<body>
    <h1>Formulario para insertar datos</h1>

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <label for="campo1">NOMBRE:</label>
        <input type="text" name="campo1" placeholder="Nombre" required><br><br>

        <label for="campo2">E-MAIL:</label>
        <input type="text" name="campo2" placeholder="Email" required><br><br>

        <label for="campo2">CONTRASEÑA:</label>
        <input type="password" name="campo3" placeholder="Contraseña"><br><br>

        <button type="submit">Enviar</button>
    </form>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif
</body>
</html>
