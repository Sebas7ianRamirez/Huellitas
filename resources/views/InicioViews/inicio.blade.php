<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Huellitas Esperanzadoras</title>
    <link rel="stylesheet" href="{{ asset('CSS/CSS Estilos_Inicio/inicio.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('Imagenes/Huella.png') }}">
    <script src="https://animatedicons.co/scripts/embed-animated-icons.js"></script>
    <script src="{{ asset('JS/ResizeTextArea.js') }}"></script>
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
                    attributes='{"variationThumbColour":"#A4A7A9","variationName":"Gray Tone","variationNumber":3,"numberOfGroups":1,"strokeWidth":1.5,"backgroundIsGroup":true,"defaultColours":{"group-1":"#054499FF","background":"#61A4FFFF"}}'
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
            <button class="btn-donar">Hacer Donación</button>
        </div>
    </section>
    <section class="seccion-grafica">
        <h2 class="titulo-gracias">GRACIAS POR TU GENEROSIDAD</h2>
        <div class="contenido-grafica">
            <div class="mensaje-gracias">
                <p>
                    <strong>¡Sin tu ayuda no sería posible todo esto!</strong>
                </p>
            </div>
            <!-- Imagen de ejemplo para simular la gráfica -->
            <img src="{{ asset('Imagenes/Estadistica ejemplo.jpg') }}" alt="Ejemplo de gráfica de donaciones"
                class="grafica-ejemplo" width="300" height="300">
        </div>
    </section>
    <section class="seccion-estadistica">
        <h2 class="Titulo-pregunta">¿QUÉ ESTAMOS NECESITANDO?</h2>
        <div class="contenido-pregunta">
            <!-- Imagen de ejemplo para simular la gráfica -->
            <img src="{{ asset('Imagenes/Estadistica ejemplo.jpg') }}" alt="Ejemplo de gráfica de donaciones"
                class="grafica-ejemplo2" width="300" height="300">
            <div class="mensaje-gracias">
                <ul>
                    <li>Alimento seco para perros y gatos</li>
                    <li>Mantas y camas para mascotas</li>
                    <li>Juguetes y accesorios</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="form-container">
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

</html>
