<form action="{{ route('insertar') }}" method="POST">
    @csrf
    <input type="text" name="campo1" placeholder="Campo 1">
    <input type="text" name="campo2" placeholder="Campo 2">
    <!-- Otros campos -->
    <button type="submit">Enviar</button>
</form>
