@extends('layout')

@section('content')
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
<br><br><br>
<h1>LISTA DE PRODUCTOS</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<button type="button" onclick="window.location.href='{{ route('ropa.create') }}'" class="btn">Añadir</button>
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ropas as $ropa)
            <tr>
                <td>{{ $ropa->name }}</td>
                <td>{{ $ropa->description }}</td>
                <td>{{ $ropa->price }}</td>
                <td>{{ $ropa->quantity }}</td>
                <td>
                    <button type="button" onclick="window.location.href='{{ route('ropa.edit', $ropa->id) }}'" class="edit-btn">Editar</button>
                    <form action="{{ route('ropa.destroy', $ropa->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn" onclick="return confirm('ESTAS SEGURO?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
