@extends('layout')

@section('content')
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
