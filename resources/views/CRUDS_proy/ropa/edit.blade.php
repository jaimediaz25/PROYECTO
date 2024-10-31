@extends('layout2')

@section('content')
<h1>HAZ ACTUALIZACIONES</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('ropa.update', $ropas->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>NOMBRE:</label>
        <input type="text" name="name" value="{{ old('name', $ropas->name) }}">
    </div>
    <div>
        <label>DESCRIPCION:</label>
        <textarea name="description">{{ old('description', $ropas->description) }}</textarea>
    </div>
    <div>
        <label>PRECIO:</label>
        <input type="text" name="price" value="{{ old('price', $ropas->price) }}">
    </div>
    <div>
        <label>CANTIDAD:</label>
        <input type="number" name="quantity" value="{{ old('quantity', $ropas->quantity) }}">
    </div>
    <button type="submit">ACTUALIZAR</button>
</form>
@endsection
