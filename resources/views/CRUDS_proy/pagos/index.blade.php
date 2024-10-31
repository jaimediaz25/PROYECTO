@extends('layout')

@section('content')
<h1>Lista de Pagos</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<button type="button" onclick="window.location.href='{{ route('pagos.create') }}'" class="btn">Añadir</button>
<table>
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Monto</th>
            <th>Método de Pago</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pagos as $pago)
            <tr>
                <td>{{ $pago->cliente }}</td>
                <td>{{ $pago->monto }}</td>
                <td>{{ $pago->metodo_pago }}</td>
                <td>
                    <button type="button" onclick="window.location.href='{{ route('pagos.edit', $pago->id) }}'" class="edit-btn">Editar</button>
                    <form action="{{ route('pagos.destroy', $pago->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn" onclick="return confirm('¿Estás seguro de que deseas eliminar este pago?');">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
