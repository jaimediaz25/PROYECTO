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

<div class="container mt-5" style="max-width: 100%; overflow-x: auto;">
    <div class="card p-4 shadow-lg" style="border: 1px solid #1e3a8a; border-radius: 15px;">
        <h2 class="text-center mb-4" style="color: #0d47a1;">Registros de Solicitudes</h2>
        
        <div style="overflow-x: auto;">
            <table class="table table-hover table-bordered" style="background-color: #f0f8ff; border-radius: 10px; width: 100%; table-layout: auto;">
                <thead style="background-color: #0d47a1; color: white;">
                    <tr>
                        <th>ID</th>
                        <th>Método</th>
                        <th>URL</th>
                        <th>Parámetros</th>
                        <th>Dirección IP</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log->id }}</td>
                            <td>{{ $log->method }}</td>
                            <td>{{ $log->url }}</td>
                            <td>
                                {{ Str::limit($log->parameters, 30) }}
                                @if(strlen($log->parameters) > 30)
                                    <a href="#" onclick="alert({{ json_encode($log->parameters) }}); return false;" style="color: #0d47a1;">Ver</a>
                                @endif
                            </td>
                            <td>{{ $log->ip_address }}</td>
                            <td>{{ $log->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination-container mt-4 d-flex justify-content-center">
            {{ $logs->links() }}
        </div>    
    </div>
</div>
<script>
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
