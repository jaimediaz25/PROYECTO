@extends('layout')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh; padding-top: 30px;">
    <div class="card p-5 shadow-lg text-center" style="max-width: 800px; width: 100%; background-color: #e0f2ff; border-radius: 12px; border: 1px solid #1e3a8a;">
        <h2 class="mb-4" style="color: #0d47a1; font-size: 2.2rem;">Menú Principal</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="list-group">
            <a href="{{ route('usuarios.index') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" style="font-size: 1.2rem; color: #0d47a1; background-color: #f0f8ff; border: 1px solid #1e3a8a;">
                <span class="fw-bold">👤 Usuarios</span>
                <i class="bi bi-arrow-right-circle"></i>
            </a>
            <a href="{{ route('ropa.index') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" style="font-size: 1.2rem; color: #0d47a1; background-color: #f0f8ff; border: 1px solid #1e3a8a;">
                <span class="fw-bold">🛒 Productos</span>
                <i class="bi bi-arrow-right-circle"></i>
            </a>
            <a href="{{ route('pedidos.index') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" style="font-size: 1.2rem; color: #0d47a1; background-color: #f0f8ff; border: 1px solid #1e3a8a;">
                <span class="fw-bold">📦 Órdenes</span>
                <i class="bi bi-arrow-right-circle"></i>
            </a>
            <a href="{{ route('pagos.index') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" style="font-size: 1.2rem; color: #0d47a1; background-color: #f0f8ff; border: 1px solid #1e3a8a;">
                <span class="fw-bold">💳 Pagos</span>
                <i class="bi bi-arrow-right-circle"></i>
            </a>
            <a href="{{ route('request.logs') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between" style="font-size: 1.2rem; color: #0d47a1; background-color: #f0f8ff; border: 1px solid #1e3a8a;">
                <span class="fw-bold">📝 Solicitudes</span>
                <i class="bi bi-arrow-right-circle"></i>
            </a>
            
            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-danger w-100" style="font-size: 1.2rem; background-color: #1e3a8a; color: white; border: none;">
                    🔒 Salir
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
