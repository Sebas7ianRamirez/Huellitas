<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="{{ asset('CSS/CSS Autenticacion/login.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('Imagenes/Huella.svg') }}">
    <script src="https://animatedicons.co/scripts/embed-animated-icons.js"></script>
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="{{ asset('Imagenes/Huella.svg') }}" alt="Logo Huella" class="logo">
            <h1>Huellitas Esperanzadoras</h1>
        </div>
        <a href="{{ route('inicio') }}" class="login-btn">
            <span class="icon-container">
                <animated-icons
                    src="https://animatedicons.co/get-icon?name=home&style=minimalistic&token=1de785be-f87f-4fdd-9cda-efb65431763b"
                    trigger="click"
                    attributes='{"variationThumbColour":"#536DFE","variationName":"Two Tone","variationNumber":2,"numberOfGroups":2,"backgroundIsGroup":false,"strokeWidth":1.5,"defaultColours":{"group-1":"#000000","group-2":"#536DFE","background":"#EFF5FFFF"}}'
                    height="40" width="40"></animated-icons>
            </span>
            <span class="login-text">Volver a Inicio</span>
        </a>
    </header>

    <div class="main-content">
        <div class="form-container">
            <!-- Imagen encima del título -->
            <img src="{{ asset('Imagenes/perrito.svg') }}" alt="Perrito" class="perrito-img">
            <h2>Inicia Sesión</h2>

            @if (session('error'))
                <p style="color:red;">{{ session('error') }}</p>
            @endif
            @if (session('success'))
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
