<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inventario - Huellitas Esperanzadoras</title>
    <link rel="stylesheet" href="{{ asset('CSS/Estilos veterinario/productos_veterinario.css') }}">
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
            <img src="{{ asset('Imagenes/perrito-blanco.svg') }}" alt="Perrito" class="perrito-img">
            <ul class="sidebar-menu">
                <li><a href="{{ route('inventario') }}">Inventario</a></li>
                <li><a href="{{ route('Productos') }}">Productos</a></li>
                <li><a href="{{ route('estadisticas') }}">Estadisticas</a></li>
            </ul>
        </nav>
        <main class="main-content">
            <div class="columnas">
                <!-- IZQUIERDA: Tabla de Productos Donados -->
                <div class="productos-donados">
                    <h2>PRODUCTOS DONADOS</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Stock Actual</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $p)
                                <tr>
                                    <td>{{ $p->nombre }}</td>
                                    <td>{{ $p->categoria }}</td>
                                    <td>{{ $p->stock_actual }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- DERECHA: Formulario de Alta -->
                <div class="form-alta">
                    <h2>AGREGAR PRODUCTO DE DONACIÓN</h2>
                    @if (session('success'))
                        <div class="alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('Productos.store') }}" method="POST">
                        @csrf

                        <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
                        @error('nombre')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <label>Categoría:</label>
                        <select name="categoria">
                            <option value="">-- Seleccione --</option>
                            @foreach ($categorias as $cat)
                                <option value="{{ $cat }}" {{ old('categoria') == $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <input type="text" name="unidad_medida" placeholder="Unidad de Medida"
                            value="{{ old('unidad_medida') }}">
                        @error('unidad_medida')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <input type="number" name="stock_actual" placeholder="Stock Actual"
                            value="{{ old('stock_actual') }}">
                        @error('stock_actual')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <input type="number" name="stock_minimo" placeholder="Stock Mínimo"
                            value="{{ old('stock_minimo') }}">
                        @error('stock_minimo')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <textarea name="descripcion" placeholder="Descripción">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn-agregar">Agregar Producto</button>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
