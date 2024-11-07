@extends('layout')
@section('content')
    <h1>Menú Principal</h1>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="menu-container">
        <a href="{{ route('usuarios.index') }}" class="menu-button">Usuarios</a>
        <a href="{{ route('ropa.index') }}" class="menu-button">Productos</a>
        <a href="{{ route('pedidos.index') }}" class="menu-button">Órdenes</a>
        <a href="{{ route('pagos.index') }}" class="menu-button">Pagos</a>
        
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="menu-button logout-button">Salir</button>
        </form>
    </div>
</body>
@endsection