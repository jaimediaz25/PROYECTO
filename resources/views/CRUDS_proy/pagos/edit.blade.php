@extends('layout2')

@section('content')
<h1>Editar Pago</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pagos.update', $pago->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Cliente:</label>
        <input type="text" name="cliente" value="{{ old('cliente', $pago->cliente) }}" required>
    </div>
    <div>
        <label>Monto:</label>
        <input type="number" step="0.01" name="monto" value="{{ old('monto', $pago->monto) }}" required>
    </div>
    <div>
        <label>Método de Pago:</label>
        <input type="text" name="metodo_pago" value="{{ old('metodo_pago', $pago->metodo_pago) }}" required>
    </div>
    <button type="submit">Actualizar Pago</button>
</form>
@endsection
