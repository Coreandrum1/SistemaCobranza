<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Sistema de cobranza</title>
    </head>

    <body>
        <div class="">
            <div class="jumbotron text-center">
                <h1 class="display-3">¡Bienvenido!</h1>
                <p>Sistema de cobranza, inicia sesión como deudor o propietario</p>
                <a class="btn-primary btn-lg" href="/login">Iniciar sesión</a>
            </div>
        </div>

    </body>
</html>