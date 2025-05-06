<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="{{ asset('CSS/CSS Autenticacion/recuperar.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('Imagenes/Huella.png') }}">
</head>
<body>
    <header>
        <img src="{{ asset('Imagenes/Huella.png') }}" alt="huella" class="logo">
        <h1>Huellitas Esperanzadoras</h1>
    </header>

    <div class="main-content">
        <div class="form-container">
            <h2>Recuperar Contraseña</h2>

            @if(session('error'))
                <p style="color:red;">{{ session('error') }}</p>
            @endif

            @if(!session('pregunta'))
                <form method="POST" action="{{ route('forgot.buscar') }}">
                    @csrf
                    <input type="email" name="email" placeholder="Ingrese su correo" required><br>
                    <button type="submit">Buscar</button>
                </form>
            @else
                <form method="POST" action="{{ route('forgot.validar') }}">
                    @csrf
                    <p><strong>Pregunta:</strong> {{ session('pregunta') }}</p>
                    <input type="hidden" name="email" value="{{ session('email') }}">
                    <input type="text" name="respuesta" placeholder="Escriba su respuesta" required><br>
                    <button type="submit">Actualizar Contraseña</button>
                </form>
            @endif
        </div>
    </div> 
</body>
</html>
