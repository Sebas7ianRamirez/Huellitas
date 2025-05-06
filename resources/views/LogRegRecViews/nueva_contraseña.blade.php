<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Contraseña</title>
</head>
<body>
    <h2>Actualizar Contraseña</h2>

    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('forgot.actualizar') }}">
        @csrf
        <input type="password" name="password" placeholder="Nueva contraseña" required><br>
        <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
