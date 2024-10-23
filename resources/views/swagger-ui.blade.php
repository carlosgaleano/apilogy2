<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swagger UI</title>
    <link rel="stylesheet" href="{{ env('APP_URL_FRONTEND') }}/swagger-ui/dist/swagger-ui.css">
</head>

<body>
    @include('banner')
    <div id="swagger-ui"></div>
    <script src="{{ env('APP_URL_FRONTEND') }}/swagger-ui/dist/swagger-ui-bundle.js"></script>
    <script src="{{ env('APP_URL_FRONTEND') }}/swagger-ui/dist/swagger-ui-standalone-preset.js"></script>
    <script>
        window.onload = function() {
            // document.querySelector('.topbar').remove();

            const ui = SwaggerUIBundle({
                url: "{{ env('APP_URL_FRONTEND') }}/swagger.json", // Asegúrate de que la URL sea correcta
                dom_id: '#swagger-ui',
                presets: [
                    SwaggerUIStandalonePreset,
                    SwaggerUIBundle.presets.apis,
                ],
                layout: "StandaloneLayout",

                requestInterceptor: (req) => {
                    // No agregar el token para la solicitud de login
                    if (req.url.includes('/api/login')) {
                        return req; // Solo retornar la solicitud sin modificaciones
                    }

                    // Si tenemos el token almacenado, lo agregamos a las cabeceras de la solicitud
                    const token = localStorage.getItem('access_token');
                    if (token) {
                        req.headers['Authorization'] = `Bearer ${token}`;
                    }
                    return req;
                },
                responseInterceptor: (res) => {
                    // Si la respuesta es del login y es exitosa, almacenamos el token
                    if (res.url.includes('/api/login') && res.status === 200) {
                        const token = JSON.parse(res.data).access_token;
                        localStorage.setItem('access_token', token); // Guardar el token en localStorage
                    }
                    return res;
                }
            });




        };
    </script>
    <style>
        .topbar {
            display: none !important;
        }

        .link {
            display: none;

        }
    </style>
</body>

</html>
