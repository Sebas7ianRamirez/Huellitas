<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel Veterinario - Huellitas Esperanzadoras</title>
    <link rel="stylesheet" href="{{ asset('CSS/Estilos veterinario/veterinario.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('Imagenes/Huella.png') }}">
    <script src="https://animatedicons.co/scripts/embed-animated-icons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donaciones->where('estado', 'sin atender') as $donacion)
                            <tr>
                                <td>{{ $donacion->nombre_donante }}</td>
                                <td>
                                    {{ $donacion->celular }}<br>
                                    {{ $donacion->email }}
                                </td>
                                <td>{{ $donacion->categoria }}</td>
                                <td>{{ $donacion->cantidad }}</td>
                                <td>
                                    <button class="btn-atendida" data-id="{{ $donacion->id }}">Atendida</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('.btn-atendida').click(function() {
            const button = $(this);
            const donacionId = button.data('id');

            if(confirm('¿Marcar esta donación como atendida?')) {
                $.ajax({
                    url: `/donaciones/${donacionId}/atendida`,
                    type: 'PATCH',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if(response.success) {
                            // Eliminar fila de la tabla
                            button.closest('tr').remove();
                        } else {
                            alert('Error al actualizar el estado.');
                        }
                    },
                    error: function() {
                        alert('Error en la petición.');
                    }
                });
            }
        });
    });
</script>

</html>
