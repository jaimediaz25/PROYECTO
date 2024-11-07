@extends('layout2')

@section('content')
<h1>Iniciar Sesión</h1>

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
    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div>
        <label>Contraseña:</label>
        <input type="password" name="password" required>
    </div>
    <button type="submit">Ingresar</button>
</form>
@endsection
