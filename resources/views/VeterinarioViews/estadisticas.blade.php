<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel Veterinario - Huellitas Esperanzadoras</title>
    <link rel="stylesheet" href="{{ asset('CSS/Estilos veterinario/estadisticas_veterinario.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('Imagenes/Huella.png') }}">
    <script src="https://animatedicons.co/scripts/embed-animated-icons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('JS/estadisticas.js') }}"></script>
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
            <a href="{{ route('veterinario.index') }}">
                <img src="{{ asset('Imagenes/perrito-blanco.svg') }}" alt="Perrito" class="perrito-img">
            </a>
            <ul class="sidebar-menu">
                <li><a href="{{ route('inventario') }}">Inventario</a></li>
                <li><a href="{{ route('Productos') }}">Productos</a></li>
                <li><a href="{{ route('estadisticas') }}">Estadisticas</a></li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <main class="main-content">
            <div class="charts-grid">
                <div class="chart-card">
                    <h2>Top 3: Más Stock</h2>
                    <canvas id="chartTopAlto"></canvas>
                </div>
                <div class="chart-card">
                    <h2>Top 3: Menos Stock</h2>
                    <canvas id="chartTopBajo"></canvas>
                </div>
                <div class="chart-card full-width">
                    <h2>Productos por Categoría</h2>
                    <canvas id="chartCategorias"></canvas>
                </div>
            </div>
        </main>
    </div>

    <script>
        const topAltoLabels = @json($topAlto->pluck('nombre'));
        const topAltoData = @json($topAlto->pluck('stock_actual'));

        const topBajoLabels = @json($topBajo->pluck('nombre'));
        const topBajoData = @json($topBajo->pluck('stock_actual'));

        const catLabels = @json($porCategoria->pluck('categoria'));
        const catData = @json($porCategoria->pluck('total'));

        // Inicializa todos los charts
        initStatisticsCharts(
            topAltoLabels, topAltoData,
            topBajoLabels, topBajoData,
            catLabels, catData
        );
    </script>

</body>

</html>
