<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Huellitas Esperanzadoras</title>
    <link rel="stylesheet" href="{{ asset('CSS/CSS Estilos_Inicio/inicio.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('Imagenes/Huella.png') }}">
    <script src="https://animatedicons.co/scripts/embed-animated-icons.js"></script>
    <script src="{{ asset('JS/ScriptsInicio.js') }}"></script>
    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- Tu script con initStatisticsCharts --}}
    <script src="{{ asset('JS/estadisticas.js') }}"></script>
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="{{ asset('Imagenes/Huella.svg') }}" alt="Logo Huella" class="logo">
            <h1>Huellitas Esperanzadoras</h1>
        </div>
        <a href="{{ route('login.form') }}" class="login-btn">
            <span class="icon-container">
                <animated-icons
                    src="https://animatedicons.co/get-icon?name=user%20profile&style=minimalistic&token=9b327b61-1433-451f-a476-148402217e82"
                    trigger="click"
                    attributes='{"variationThumbColour":"#536DFE","variationName":"Two Tone","variationNumber":2,"numberOfGroups":2,"backgroundIsGroup":false,"strokeWidth":1.5,"defaultColours":{"group-1":"#000000","group-2":"#536DFE","background":"#EFF5FFFF"}}'
                    height="40" width="40"></animated-icons>
            </span>
            <span class="login-text">Iniciar sesión</span>
        </a>
    </header>

    <section class="seccion-principal">
        <div class="imagen-izquierda">
            <img src="{{ asset('Imagenes/perrito.svg') }}" alt="Perrito y Gato" class="mascotas-grande">
        </div>
        <div class="texto-derecha">
            <h2 class="mensaje-principal">PEQUEÑAS ACCIONES</h2>
            <h3 class="mensaje-secundario">GRANDES CAMBIOS PARA ELLOS</h3>
            <button class="btn-donar"
                onclick="document.getElementById('form-donacion').scrollIntoView({ behavior: 'smooth' });">
                Hacer Donación
            </button>
        </div>
    </section>
    <!-- sección gráfica: top 3 más stock -->
    <section class="seccion-grafica">
        <h2 class="titulo-gracias">GRACIAS POR TU GENEROSIDAD</h2>
        <div class="contenido-grafica">
            <div class="mensaje-gracias">
                <p><strong>¡Sin tu ayuda no sería posible todo esto!</strong></p>
            </div>
            {{-- Aquí va el canvas, no la imagen de ejemplo --}}
            <canvas id="chartTopAlto" class="grafica-ejemplo"></canvas>
        </div>
    </section>
    <!-- sección estadística: top 3 menos stock -->
    <section class="seccion-estadistica">
        <h2 class="Titulo-pregunta">¿QUÉ ESTAMOS NECESITANDO?</h2>
        <div class="contenido-pregunta">
            {{-- Canvas para el top 3 menos stock --}}
            <canvas id="chartTopBajo" class="grafica-ejemplo2"></canvas>

            <div class="mensaje-gracias">
                <ul>
                    <li>Alimento seco para perros y gatos</li>
                    <li>Mantas y camas para mascotas</li>
                    <li>Juguetes y accesorios</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="form-container" id="form-donacion">
        <h2>Hacer una Donación</h2>

        @if (session('success'))
            <div style="background:#1e4d91; color:#fff; padding:10px; border-radius:8px; margin-bottom:15px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('donations.store') }}" method="POST">
            @csrf

            <input type="text" id="nombre_donante" name="nombre_donante" value="{{ old('nombre_donante') }}"
                placeholder="Nombre" required>
            @error('nombre_donante')
                <div style="color:red;">{{ $message }}</div>
            @enderror

            <input type="text" id="celular" name="celular" value="{{ old('celular') }}" placeholder="Celular"
                required>
            @error('celular')
                <div style="color:red;">{{ $message }}</div>
            @enderror

            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Correo"
                required>
            @error('email')
                <div style="color:red;">{{ $message }}</div>
            @enderror

            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="">Seleccione una categoría</option>
                @foreach ($categories as $categoria)
                    <option value="{{ $categoria }}" {{ old('categoria') == $categoria ? 'selected' : '' }}>
                        {{ $categoria }}</option>
                @endforeach
            </select>
            @error('categoria')
                <div style="color:red;">{{ $message }}</div>
            @enderror

            <input type="number" id="cantidad" name="cantidad" value="{{ old('cantidad') }}" min="1"
                placeholder="Cantidad" required>
            @error('cantidad')
                <div style="color:red;">{{ $message }}</div>
            @enderror

            <textarea id="descripcion" name="descripcion" placeholder="Descripción">{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <div style="color:red;">{{ $message }}</div>
            @enderror

            <img src="{{ asset('Imagenes/perrito.svg') }}" alt="Perrito y Gato" class="mascotas-formulario">

            <button type="submit" class="btn-donar" style="margin-top:15px;">Hacer Solicitud</button>
        </form>
    </section>
</body>

{{-- Datos y llamada a la función --}}
<script>
    const topAltoLabels = @json($topAlto->pluck('nombre'));
    const topAltoData = @json($topAlto->pluck('stock_actual'));

    const topBajoLabels = @json($topBajo->pluck('nombre'));
    const topBajoData = @json($topBajo->pluck('stock_actual'));

    // Inicializa SOLO los dos charts que usas aquí.
    initStatisticsCharts(
        topAltoLabels, topAltoData,
        topBajoLabels, topBajoData,
        [], [] // Como no necesitas el 3º pie aquí, pásales arrays vacíos
    );
</script>

</html>
