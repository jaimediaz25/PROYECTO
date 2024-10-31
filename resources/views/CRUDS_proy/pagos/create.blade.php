@extends('layout2')

@section('content')
<h1>Crear Pago</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pagos.store') }}" method="POST">
    @csrf
    <div>
        <label>Cliente:</label>
        <input type="text" name="cliente" required>
    </div>
    <div>
        <label>Monto:</label>
        <input type="number" step="0.01" name="monto" required>
    </div>
    <div>
        <label>Método de Pago:</label>
        <input type="text" name="metodo_pago" required>
    </div>
    <button type="submit">Crear Pago</button>
</form>
@endsection
