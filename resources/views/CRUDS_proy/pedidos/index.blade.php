@extends('layout')

@section('content')
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
