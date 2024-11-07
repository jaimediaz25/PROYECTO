@extends('layout')

@section('content')
<div class="menu-container">
    <a href="{{ route('usuarios.index') }}" class="menu-button">Usuarios</a>
    <a href="{{ route('ropa.index') }}" class="menu-button">Productos</a>
    <a href="{{ route('pedidos.index') }}" class="menu-button">Órdenes</a>
    <a href="{{ route('pagos.index') }}" class="menu-button">Pagos</a>
    <a href="{{ route('request.logs') }}" class="menu-button">Solicitudes</a>
    <a href="{{ route('listamenu') }}" class="menu-button">Menu</a>
    
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="menu-button logout-button">Salir</button>
    </form>
</div>
<br><br><br>
<h1>Lista de Pedidos</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<button type="button" onclick="window.location.href='{{ route('pedidos.create') }}'" class="btn">Añadir</button>
<table>
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pedidos as $pedido)
            <tr>
                <td>{{ $pedido->cliente }}</td>
                <td>{{ $pedido->producto }}</td>
                <td>{{ $pedido->cantidad }}</td>
                <td>{{ $pedido->total }}</td>
                <td>
                    <button type="button" onclick="window.location.href='{{ route('pedidos.edit', $pedido->id) }}'" class="edit-btn">Editar</button>
                    <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn" onclick="return confirm('¿Estás seguro de que deseas eliminar este pedido?');">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
