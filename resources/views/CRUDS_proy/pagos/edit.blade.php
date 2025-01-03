@extends('layout2')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <div class="card p-4 shadow-lg" style="border: 2px solid #1e3a8a; border-radius: 15px; background-color: #f1f8ff;">
        <h2 class="text-center mb-4" style="color: #0d47a1;">Editar Pago</h2>

        @if ($errors->any())
            <div class="alert alert-danger" style="color: #d32f2f; background-color: #ffebee; border-radius: 8px; padding: 10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pagos.update', $pago->id) }}" method="POST" id="edit-payment-form">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="cliente" style="color: #0d47a1;">Cliente:</label>
                <input type="text" name="cliente" class="form-control" value="{{ old('cliente', $pago->cliente) }}" required style="border-radius: 10px; padding: 10px; border: 1px solid #0d47a1;">
            </div>

            <div class="form-group mb-3">
                <label for="monto" style="color: #0d47a1;">Monto:</label>
                <input type="number" step="0.01" name="monto" class="form-control" value="{{ old('monto', $pago->monto) }}" required style="border-radius: 10px; padding: 10px; border: 1px solid #0d47a1;">
            </div>

            <div class="form-group mb-4">
                <label for="metodo_pago" style="color: #0d47a1;">Método de Pago:</label>
                <input type="text" name="metodo_pago" class="form-control" value="{{ old('metodo_pago', $pago->metodo_pago) }}" required style="border-radius: 10px; padding: 10px; border: 1px solid #0d47a1;">
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn px-4 py-2" style="background-color: #0288d1; color: white; font-weight: bold; border-radius: 10px; text-transform: uppercase; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    Actualizar Pago
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    $(document).ready(function() {
    $('#edit-payment-form').on('submit', function(event) {
        event.preventDefault(); 
        var data = $(this).serialize(); 
        var url = $(this).attr('action');
       
        $.ajax({
            type: 'POST',
            url: url,
            data: data,
            success: function(response) {
                console.log("Pago actualizado con éxito");
            },
            error: function(xhr, status, error) {
                console.error("Error al actualizar el pago: ", error);
            }
        });
    });
});

</script>
@endsection
