@extends('layout2')

@section('content')
<h1>EDITA EL PRODUCTO</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Nombre:</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
    </div>
    <div>
        <label>Descripción:</label>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>
    </div>
    <div>
        <label>Precio:</label>
        <input type="text" name="price" value="{{ old('price', $product->price) }}">
    </div>
    <div>
        <label>Stock:</label>
        <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}">
    </div>
    <button type="submit">Editar</button>
</form>
@endsection
