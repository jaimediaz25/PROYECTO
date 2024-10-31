@extends('layout2')

@section('content')
<h1>Crear Usuario</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf
    <div>
        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" required>
    </div>
    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div>
        <label>Contraseña:</label>
        <input type="password" name="contrasena" required>
    </div>
    <button type="submit">Crear Usuario</button>
</form>
@endsection
