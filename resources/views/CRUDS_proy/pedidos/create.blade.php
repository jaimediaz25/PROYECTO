@extends('layout2')

@section('content')
<h1>Crear Pedido</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pedidos.store') }}" method="POST">
    @csrf
    <div>
        <label>Cliente:</label>
        <input type="text" name="cliente" required>
    </div>
    <div>
        <label>Producto:</label>
        <input type="text" name="producto" required>
    </div>
    <div>
        <label>Cantidad:</label>
        <input type="number" name="cantidad" required>
    </div>
    <div>
        <label>Total:</label>
        <input type="number" step="0.01" name="total" required>
    </div>
    <button type="submit">Crear Pedido</button>
</form>
@endsection
