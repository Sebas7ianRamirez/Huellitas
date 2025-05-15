<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inventario - Huellitas Esperanzadoras</title>
    <link rel="stylesheet" href="{{ asset('CSS/Estilos veterinario/inventario_veterinario.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('Imagenes/Huella.png') }}">
    <script src="https://animatedicons.co/scripts/embed-animated-icons.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <header>
        <!-- Header existente -->
        <div class="logo-container">
            <img src="{{ asset('Imagenes/Huella.svg') }}" alt="Logo Huella" class="logo">
            <h1>Huellitas Esperanzadoras</h1>
        </div>
        <a href="{{ route('login') }}" class="login-btn">
            <span class="icon-container">
                <animated-icons
                    src="https://animatedicons.co/get-icon?name=exit&style=minimalistic&token=6e09845f-509a-4b0a-a8b0-c47e168ad977"
                    trigger="click"
                    attributes='{"variationThumbColour":"#536DFE","variationName":"Two Tone","variationNumber":2,"numberOfGroups":2,"backgroundIsGroup":false,"strokeWidth":1.5,"defaultColours":{"group-1":"#000000","group-2":"#536DFE","background":"#EFF5FFFF"}}'
                    height="35" width="35"></animated-icons>
            </span>
            <span class="login-text">Cerrar Sesión</span>
        </a>
    </header>
    <div class="main-container">
        <!-- Menú lateral -->
        <nav class="sidebar">
            <img src="{{ asset('Imagenes/perrito.svg') }}" alt="Perrito" class="perrito-img">
            <ul class="sidebar-menu">
                <li><a href="{{ route('inventario') }}">Inventario</a></li>
                <li><a href="{{ route('Productos') }}">Productos</a></li>
                <li><a href="{{ route('estadisticas') }}">Estadisticas</a></li>
            </ul>
        </nav>
        <main class="main-content">
            
        </main>
    </div>
</body>