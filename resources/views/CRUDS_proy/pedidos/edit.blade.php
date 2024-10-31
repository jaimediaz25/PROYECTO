@extends('layout2')

@section('content')
<h1>Editar Pedido</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Cliente:</label>
        <input type="text" name="cliente" value="{{ old('cliente', $pedido->cliente) }}" required>
    </div>
    <div>
        <label>Producto:</label>
        <input type="text" name="producto" value="{{ old('producto', $pedido->producto) }}" required>
    </div>
    <div>
        <label>Cantidad:</label>
        <input type="number" name="cantidad" value="{{ old('cantidad', $pedido->cantidad) }}" required>
    </div>
    <div>
        <label>Total:</label>
        <input type="number" step="0.01" name="total" value="{{ old('total', $pedido->total) }}" required>
    </div>
    <button type="submit">Actualizar Pedido</button>
</form>
@endsection
