@extends('layout')

@section('content')
<div class="container">
    <h1>LISTA DE PRODUCTOS</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón de añadir producto -->
    <button type="button" onclick="window.location.href='{{ route('products.create') }}'" class="btn">Añadir</button>

    <!-- Tabla de productos -->
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <button type="button" onclick="window.location.href='{{ route('products.edit', $product->id) }}'" class="edit-btn">Editar</button>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('No me elimines cuyeyo:(')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination">
        {{ $products->links() }}
    </div>
</div>


@endsection
