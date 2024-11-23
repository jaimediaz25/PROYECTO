@extends('layout')

@section('content')
<div class="menu-container mb-4" style="overflow-x: auto; white-space: nowrap; margin-bottom: 20px;">
    <div class="card p-3 shadow-lg" style="border-radius: 15px; background-color: #f1f8ff; border: 2px solid #1e3a8a;">
        <div class="d-flex justify-content-start align-items-center" style="gap: 20px; flex-wrap: wrap;">
            <a href="{{ route('usuarios.index') }}" class="menu-button px-3 py-2 rounded-pill" style="background-color: #0288d1; color: white; font-weight: bold; text-transform: uppercase; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease;">
                👤 Usuarios
            </a>
            <a href="{{ route('ropa.index') }}" class="menu-button px-3 py-2 rounded-pill" style="background-color: #1e3a8a; color: white; font-weight: bold; text-transform: uppercase; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease;">
                🛒 Productos
            </a>
            <a href="{{ route('pedidos.index') }}" class="menu-button px-3 py-2 rounded-pill" style="background-color: #0288d1; color: white; font-weight: bold; text-transform: uppercase; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease;">
                📦 Órdenes
            </a>
            <a href="{{ route('pagos.index') }}" class="menu-button px-3 py-2 rounded-pill" style="background-color: #1e3a8a; color: white; font-weight: bold; text-transform: uppercase; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease;">
                💳 Pagos
            </a>
            <a href="{{ route('request.logs') }}" class="menu-button px-3 py-2 rounded-pill" style="background-color: #0288d1; color: white; font-weight: bold; text-transform: uppercase; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease;">
                📝 Solicitudes
            </a>
            <a href="{{ route('listamenu') }}" class="menu-button px-3 py-2 rounded-pill" style="background-color: #1e3a8a; color: white; font-weight: bold; text-transform: uppercase; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease;">
                Menú Principal
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="menu-button logout-button px-3 py-2 rounded-pill" style="background-color: #d32f2f; color: white; font-weight: bold; text-transform: uppercase; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease;">
                    Salir
                </button>
            </form>
        </div>
    </div>
</div>

<div class="container mt-5" style="max-width: 900px;">
    <div class="card p-4 shadow-lg" style="border: 1px solid #1e3a8a; border-radius: 15px;">
        <h2 class="text-center mb-4" style="color: #0d47a1;">Lista de Productos</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <button type="button" onclick="window.location.href='{{ route('ropa.create') }}'" class="btn btn-success mb-3" style="background-color: #388e3c; color: white; border-radius: 8px; padding: 12px 24px; font-weight: bold; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); transition: background-color 0.3s ease;">
            Añadir Producto
        </button>
        <table class="table table-hover table-bordered" style="background-color: #f0f8ff; border-radius: 10px;">
            <thead style="background-color: #0d47a1; color: white; border-radius: 10px;">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ropas as $ropa)
                    <tr id="row-{{ $ropa->id }}">
                        <td>{{ $ropa->name }}</td>
                        <td>{{ $ropa->description }}</td>
                        <td>{{ $ropa->price }}</td>
                        <td>{{ $ropa->quantity }}</td>
                        <td class="d-flex">
                            <button type="button" onclick="window.location.href='{{ route('ropa.edit', $ropa->id) }}'" class="btn btn-sm" style="background-color: #0d508f; color: white; border-radius: 8px; margin-right: 10px; padding: 8px 16px; font-weight: bold; transition: background-color 0.3s ease;">
                                Editar
                            </button>
                            <form action="{{ route('ropa.destroy', $ropa->id) }}" method="POST" class="delete-form" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" style="background-color: #ff4444; color: white; border-radius: 8px; padding: 8px 16px; font-weight: bold; transition: background-color 0.3s ease;" data-id="{{ $ropa->id }}">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>            
        </table>
        <div class="pagination-container mt-4 d-flex justify-content-center">
            {{ $ropas->links() }}
        </div>    
    </div>
</div>
<script>
    $(document).ready(function () {
    $('.delete-form').on('submit', function (event) {
        event.preventDefault();
        const form = $(this);
        const url = form.attr('action');
        const id = form.find('button').data('id');

        $.ajax({
            type: 'POST',
            url: url,
            data: form.serialize(),
            success: function (response) {
                console.log('Producto eliminado correctamente');
                $('#row-' + id).fadeOut();
            },
            error: function (error) {
                console.log('Hubo un error al eliminar el producto:', error);
            }
        });
    });
});

$(document).ready(function() {
    $('#logout-form').on('submit', function(event) {
        event.preventDefault();  
        
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            
            success: function(response) {
                console.log('Cerraste sesión correctamente');
                window.location.href = '{{ route('login') }}';
            },
            error: function(xhr, status, error) {
                console.error('Error al cerrar sesión:', error);
            }
        });
    });
});

</script>
@endsection
