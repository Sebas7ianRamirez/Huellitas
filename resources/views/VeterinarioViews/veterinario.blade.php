<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel Veterinario - Huellitas Esperanzadoras</title>
    <link rel="stylesheet" href="{{ asset('CSS/Estilos veterinario/veterinario.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('Imagenes/Huella.png') }}">
    <script src="https://animatedicons.co/scripts/embed-animated-icons.js"></script>
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
            <img src="{{ asset('Imagenes/perrito-blanco.svg') }}" alt="Perrito" class="perrito-img">
            <ul class="sidebar-menu">
                <li><a href="{{ route('inventario') }}">Inventario</a></li>
                <li><a href="{{ route('Productos') }}">Productos</a></li>
                <li><a href="{{ route('estadisticas') }}">Estadisticas</a></li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <main class="main-content">
            <!-- Gráfica placeholder -->
            {{-- <div class="graph-placeholder">
                <img src="{{ asset('Imagenes/Estadistica ejemplo.jpg') }}" alt="Gráfico de inventario"
                    style="max-width: 100%;">
                <p>Gráfico de niveles de inventario</p>
            </div> --}}
            <div class="inventario-container">
                <h2 class="section-title">Inventario Actual</h2>
                <form id="stock-update-form" method="POST" action="{{ route('productos.actualizarStock') }}">
                    @csrf
                    <table class="inventory-table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Stock Actual</th>
                                <th>Modificar Stock</th> <!-- Nueva columna -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto->nombre }}</td>
                                    <td>{{ $producto->categoria }}</td>
                                    <td>{{ $producto->stock_actual }} {{ $producto->unidad_medida }}</td>
                                    <td>
                                        <input type="number" name="stock_actual[{{ $producto->id }}]"
                                            value="{{ $producto->stock_actual }}" min="0" class="stock-input">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn-Actualizar">Actualizar Stock</button>
                </form>
            </div>

            <div class="donaciones-container">
                <h2 class="section-title">Donaciones Recientes</h2>
                <table class="inventory-table">
                    <thead>
                        <tr>
                            <th>Donante</th>
                            <th>Contacto</th>
                            <th>Categoría</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donaciones as $donacion)
                            <tr>
                                <td>{{ $donacion->nombre_donante }}</td>
                                <td>
                                    {{ $donacion->celular }}<br>
                                    {{ $donacion->email }}
                                </td>
                                <td>{{ $donacion->categoria }}</td>
                                <td>{{ $donacion->cantidad }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>

</html>
