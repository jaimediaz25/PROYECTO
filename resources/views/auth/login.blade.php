@extends('layout2')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-5 shadow-lg" style="max-width: 800px; width: 100%; background-color: #f0f8ff;">
        <h2 class="text-center mb-5" style="color: #1e3a8a; font-size: 2.2rem;">Iniciar Sesión</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="form-label" style="color: #1e3a8a; font-size: 1.2rem;">Correo Electrónico</label>
                <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Ingresa tu correo" value="{{ old('email') }}" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label" style="color: #1e3a8a; font-size: 1.2rem;">Contraseña</label>
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Ingresa tu contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" style="background-color: #1e3a8a; font-size: 1.3rem; padding: 1rem;">Ingresar</button>
        </form>
    </div>
</div>
@endsection
