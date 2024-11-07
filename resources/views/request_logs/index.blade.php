@extends('layout')

@section('content')
<div class="menu-container">
    <a href="{{ route('usuarios.index') }}" class="menu-button">Usuarios</a>
    <a href="{{ route('ropa.index') }}" class="menu-button">Productos</a>
    <a href="{{ route('pedidos.index') }}" class="menu-button">Órdenes</a>
    <a href="{{ route('pagos.index') }}" class="menu-button">Pagos</a>
    
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="menu-button logout-button">Salir</button>
    </form>
</div>
<br><br><br>
    <h1>Registros de Solicitudes</h1>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Método</th>
                <th>URL</th>
                <th>Parametros</th>
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
                        {{ Str::limit($log->parameters, 50) }}
                        @if(strlen($log->parameters) > 50)
                            <a href="#" onclick="alert({{ json_encode($log->parameters) }}); return false;">Ver</a>
                        @endif
                    </td>
                    <td>{{ $log->ip_address }}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
