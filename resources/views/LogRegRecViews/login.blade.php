<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('CSS/CSS Autenticacion/login.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('Imagenes/Huella.svg') }}">
</head>
<body>
    <header>
        <img src="{{ asset('Imagenes/Huella.png') }}" alt="huella" class="logo">
        <h1>Huellitas Esperanzadoras</h1>
    </header>

    <div class="main-content">
        <div class="form-container">
            <!-- Imagen encima del título -->
            <img src="{{ asset('Imagenes/perrito.svg') }}" alt="Perrito" class="perrito-img">
            <h2>Inicia Sesión</h2>

            @if(session('error'))
                <p style="color:red;">{{ session('error') }}</p>
            @endif
            @if(session('success'))
                <p style="color:green;">{{ session('success') }}</p>
            @endif


            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" name="email" placeholder="Correo" required><br>
                <input type="password" name="password" placeholder="Contraseña" required><br>
                <!-- Enlace justo debajo de la contraseña -->
                <p style="margin: 5px 0;">
                    <a href="{{ route('forgot.form') }}">¿Olvidó su contraseña?</a>
                </p>
                <button type="submit">Ingresar</button>
            </form>
        </div>
    </div> 
</body>
</html>
