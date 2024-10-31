@extends('layout2')

@section('content')
<h1>Editar Usuario</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $usuario->nombre) }}" required>
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $usuario->email) }}" required>
    </div>
    <div>
        <label>Contraseña:</label>
        <input type="password" name="contrasena">
    </div>
    <button type="submit">Actualizar Usuario</button>
</form>
@endsection
