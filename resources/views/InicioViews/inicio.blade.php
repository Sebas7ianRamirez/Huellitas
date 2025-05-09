
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Huellitas Esperanzadoras</title>
    <link rel="stylesheet" href="{{ asset('CSS/CSS Estilos_Inicio/inicio.css') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('Imagenes/Huella.png') }}">
    <script src="https://animatedicons.co/scripts/embed-animated-icons.js"></script>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="{{ asset('Imagenes/Huella.svg') }}" alt="Logo Huella" class="logo">
            <h1>Huellitas Esperanzadoras</h1>
        </div>
        <div class="user-icon">
            <animated-icons
                src="https://animatedicons.co/get-icon?name=user%20profile&style=minimalistic&token=9b327b61-1433-451f-a476-148402217e82"
                trigger="click"
                attributes='{"variationThumbColour":"#A4A7A9","variationName":"Gray Tone","variationNumber":3,"numberOfGroups":1,"strokeWidth":1.5,"backgroundIsGroup":true,"defaultColours":{"group-1":"#054499FF","background":"#61A4FFFF"}}'
                height="40"
                width="40"
            ></animated-icons>
        </div>
    </header>

    <section class="seccion-principal">
        <div class="imagen-izquierda">
            <img src="{{ asset('Imagenes/perrito.svg') }}" alt="Perrito y Gato" class="mascotas-grande">
        </div>
        <div class="texto-derecha">
            <h2 class="mensaje-principal">PEQUEÑAS ACCIONES</h2>
            <h3 class="mensaje-secundario">GRANDES CAMBIOS PARA ELLOS.</h3>
            <button class="btn-donar">Hacer Donación</button>
        </div>
    </section>
</body>
</html>
