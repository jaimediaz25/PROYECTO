@extends('layout2')

@section('content')
<h1>INGRESA LOS DATOS</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div>
        <label>Nombre:</label>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>
    <div>
        <label>Descripción:</label>
        <textarea name="description">{{ old('description') }}</textarea>
    </div>
    <div>
        <label>Precio:</label>
        <input type="text" name="price" value="{{ old('price') }}">
    </div>
    <div>
        <label>Stock:</label>
        <input type="number" name="quantity" value="{{ old('quantity') }}">
    </div>
    <button type="submit">Añadir</button>
</form>
@endsection
