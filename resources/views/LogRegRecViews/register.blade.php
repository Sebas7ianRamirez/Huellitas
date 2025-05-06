<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="{{ asset('CSS/register.css') }}">
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
            <input type="text" name="name" placeholder="Nombre" required><br>
            <input type="email" name="email" placeholder="Correo" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>

            <label>Selecciona una pregunta secreta:</label><br>
            <select name="security_question" required>
                <option value="">-- Selecciona una pregunta --</option>
                <option value="¿Cuál es tu color favorito?">¿Cuál es tu color favorito?</option>
                <option value="¿Cómo se llamaba tu primera mascota?">¿Cómo se llamaba tu primera mascota?</option>
                <option value="¿Cuál es tu comida favorita?">¿Cuál es tu comida favorita?</option>
                <option value="¿En qué ciudad naciste?">¿En qué ciudad naciste?</option>
                <option value="¿Nombre de tu mejor amigo de infancia?">¿Nombre de tu mejor amigo de infancia?</option>
            </select><br>
            <input type="text" name="security_answer" placeholder="Respuesta secreta" required><br>

            <button type="submit">Registrarse</button>
        </form>
    </div>
</body>
</html>
