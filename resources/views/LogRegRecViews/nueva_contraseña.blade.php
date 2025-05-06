<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Contraseña</title>
    <link rel="stylesheet" href="{{ asset('CSS/nueva_contraseña.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('Imagenes/Huella.png') }}">
</head>
<body>
    <header>
        <img src="{{ asset('Imagenes/Huella.png') }}" alt="huella" class="logo">
        <h1>Huellitas Esperanzadoras</h1>
    </header>

    <div class="main-content">
        <div class="form-container">
            <h2>Actualizar Contraseña</h2>

            @if(session('error'))
                <p style="color:red;">{{ session('error') }}</p>
            @endif

            {{-- Mostrar errores de validación --}}
            @if ($errors->any())
                <ul style="color:red;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('forgot.actualizar') }}">
                @csrf
                <input type="password" name="password" placeholder="Nueva contraseña" required><br>
                <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required><br>
                <button type="submit">Actualizar</button>
            </form>
        </div>
    </div> 
</body>
</html>
