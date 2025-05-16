<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('CSS/CSS Autenticacion/register.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('Imagenes/Huella.png') }}">
</head>
<body>
    <header>
        <img src="{{ asset('Imagenes/Huella.png') }}" alt="huella" class="logo">
        <h1>Huellitas Esperanzadoras</h1>
    </header>

    <div class="form-container">
        <h2>Registro de Usuario</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input type="text" name="name" placeholder="Nombre" value="{{ old('name') }}" required>
            @error('name') <div class="error">{{ $message }}</div> @enderror

            <input type="email" name="email" placeholder="Correo" value="{{ old('email') }}" required>
            @error('email') <div class="error">{{ $message }}</div> @enderror

            <input type="password" name="password" placeholder="Contraseña" required>
            @error('password') <div class="error">{{ $message }}</div> @enderror

            <label>Selecciona una pregunta secreta:</label>
            <select name="security_question" required>
                <option value="">-- Selecciona una pregunta --</option>
                <option value="¿Cuál es tu color favorito?">¿Cuál es tu color favorito?</option>
                <option value="¿Cómo se llamaba tu primera mascota?">¿Cómo se llamaba tu primera mascota?</option>
                <option value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
                <option value="¿En qué ciudad naciste?">¿En qué ciudad naciste?</option>
                <option value="¿Nombre de tu mejor amigo de infancia?">¿Nombre de tu mejor amigo de infancia?</option>
            </select>
            @error('security_question') <div class="error">{{ $message }}</div> @enderror

            <input type="text" name="security_answer" placeholder="Respuesta secreta" value="{{ old('security_answer') }}" required>
            @error('security_answer') <div class="error">{{ $message }}</div> @enderror

            <!-- Nuevo campo de rol: solo acceso administrador -->
            <label class="label-rol">Rol de usuario:</label>
            <select name="role" required>
                <option value="">-- Selecciona un rol --</option>
                <option value="veterinario" {{ old('role')=='veterinario'?'selected':'' }}>Veterinario</option>
                <option value="admin"        {{ old('role')=='admin'?'selected':'' }}>Administrador</option>
            </select>
            @error('role') <div class="error">{{ $message }}</div> @enderror

            <button type="submit">Registrarse</button>
        </form>
    </div>
</body>
</html>
