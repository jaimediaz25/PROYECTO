@extends('layout2')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <div class="card p-4 shadow-lg" style="border: 2px solid #1e3a8a; border-radius: 15px; background-color: #f1f8ff;">
        <h2 class="text-center mb-4" style="color: #0d47a1;">Crear Usuario</h2>

        @if ($errors->any())
            <div class="alert alert-danger" style="color: #d32f2f; background-color: #ffebee; border-radius: 8px; padding: 10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="nombre" style="color: #0d47a1;">Nombre:</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control" required style="border-radius: 10px; padding: 10px; border: 1px solid #0d47a1;">
            </div>
            
            <div class="form-group mb-3">
                <label for="email" style="color: #0d47a1;">Email:</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required style="border-radius: 10px; padding: 10px; border: 1px solid #0d47a1;">
            </div>

            <div class="form-group mb-3">
                <label for="contrasena" style="color: #0d47a1;">Contraseña:</label>
                <input type="password" name="contrasena" class="form-control" required style="border-radius: 10px; padding: 10px; border: 1px solid #0d47a1;">
            </div>

            <div class="form-group mb-4">
                <label for="role" style="color: #0d47a1;">Rol:</label>
                <select name="role" class="form-control" required style="border-radius: 10px; padding: 10px; border: 1px solid #0d47a1;">
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Usuario</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn px-4 py-2" style="background-color: #0288d1; color: white; font-weight: bold; border-radius: 10px; text-transform: uppercase; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    Crear Usuario
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
