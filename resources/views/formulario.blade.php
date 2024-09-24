<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Inserción</title>
</head>
<body>
    <h1>Formulario para insertar datos</h1>

    <form action="{{ route('store') }}" method="POST">
        @csrf
        <label for="campo1">Campo 1:</label>
        <input type="text" name="campo1" placeholder="Nombre" required><br><br>

        <label for="campo2">Campo 2:</label>
        <input type="text" name="campo2" placeholder="Email" required><br><br>

        <label for="campo2">Campo 3:</label>
        <input type="password" name="campo3" placeholder="Contraseña">

        <button type="submit">Enviar</button>
    </form>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif
</body>
</html>
