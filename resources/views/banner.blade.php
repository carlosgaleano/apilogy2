<!-- resources/views/banner.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentación API</title>
{{--     <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Agrega tu CSS aquí -->
 --}}    <style>
        .banner {
            display: flex;
            align-items: center;
            color: #ebe0e0;
            justify-content: space-between;
            background-color: #05201d; /* Color de fondo del banner */
            padding: 10px 20px; /* Espaciado interno */
            border-bottom: 2px solid #ddd; /* Línea inferior */
        }

        .banner img {
            max-height: 60px; /* Ajusta la altura del logo */
        }

        .banner h1 {
            font-size: 24px; /* Tamaño del texto */
            margin: 0; /* Elimina márgenes */
        }
    </style>
</head>
<body>

    <header class="banner">
        <img src="{{ env('APP_URL_FRONTEND') }}/img/logo_logy.jpg" alt="Logo Logitech Chile">
        <h1>Documentación API TSA VERIFONE</h1>
        <img src="{{ env('APP_URL_FRONTEND') }}/img/logo_swagger.png" alt="Logo Swagger">
    </header>

    <!-- Contenido de la página -->
    <div>
        @yield('content')
    </div>

</body>
</html>
