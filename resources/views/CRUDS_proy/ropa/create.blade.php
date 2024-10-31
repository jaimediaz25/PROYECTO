@extends('layout2')

@section('content')
<h1>INSERTA UN PRODUCTO</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('ropa.store') }}" method="POST">
    @csrf
    <div>
        <label>NOMBRE:</label>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>
    <div>
        <label>DESCRIPCION:</label>
        <textarea name="description">{{ old('description') }}</textarea>
    </div>
    <div>
        <label>PRECIO:</label>
        <input type="text" name="price" value="{{ old('price') }}">
    </div>
    <div>
        <label>CANTIDAD:</label>
        <input type="number" name="quantity" value="{{ old('quantity') }}">
    </div>
    <button type="submit">AGREGAR</button>
</form>
@endsection
