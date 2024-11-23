@extends('layout2')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <div class="card p-4 shadow-lg" style="border: 2px solid #1e3a8a; border-radius: 15px; background-color: #f1f8ff;">
        <h2 class="text-center mb-4" style="color: #0d47a1;">Inserta un Producto</h2>

        @if ($errors->any())
            <div class="alert alert-danger" style="color: #d32f2f; background-color: #ffebee; border-radius: 8px; padding: 10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="product-form" action="{{ route('ropa.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name" style="color: #0d47a1;">Nombre:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required style="border-radius: 10px; padding: 10px; border: 1px solid #0d47a1;">
            </div>

            <div class="form-group mb-3">
                <label for="description" style="color: #0d47a1;">Descripción:</label>
                <textarea name="description" id="description" class="form-control" required style="border-radius: 10px; padding: 10px; border: 1px solid #0d47a1;">{{ old('description') }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="price" style="color: #0d47a1;">Precio:</label>
                <input type="text" name="price" id="price" value="{{ old('price') }}" class="form-control" required style="border-radius: 10px; padding: 10px; border: 1px solid #0d47a1;">
            </div>

            <div class="form-group mb-4">
                <label for="quantity" style="color: #0d47a1;">Cantidad:</label>
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" class="form-control" required style="border-radius: 10px; padding: 10px; border: 1px solid #0d47a1;">
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn px-4 py-2" style="background-color: #0288d1; color: white; font-weight: bold; border-radius: 10px; text-transform: uppercase; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    Agregar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#product-form').on('submit', function(event) {
        event.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');

        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response) {
                console.log('Producto creado exitosamente');
                $('#product-form')[0].reset();
            },
            error: function(error) {
                console.log('Hubo un error al procesar el producto.');
                console.log(error);
            }
        });
    });
});
</script>
@endsection