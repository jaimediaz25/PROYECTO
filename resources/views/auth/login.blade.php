@extends('layout2')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-5 shadow-lg" style="max-width: 800px; width: 100%; background-color: #f0f8ff;">
        <h2 class="text-center mb-5" style="color: #1e3a8a; font-size: 2.2rem;">Iniciar Sesión</h2>

        <form id="login-form" method="POST" action="{{ route('login.submit') }}">
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

<script>
$(document).ready(function() {
    $('#login-form').on('submit', function(event) {
        event.preventDefault(); 
        var data = $(this).serialize();
        var url = $(this).attr('action');
        console.log(data);
        console.log(url); 

        $.ajax({
            type: 'POST',
            url: url,  
            data: data,
            success: function(response) {
                console.log('Login exitoso');
                window.location.href = 'listamenu';
            },
            error: function(error) {
                if (error.responseJSON && error.responseJSON.errors && error.responseJSON.errors.email) {
                    console.log('Credenciales incorrectas');
                } else {
                    console.log('Error desconocido');
                }
            }
        });
    });
});
</script>

@endsection