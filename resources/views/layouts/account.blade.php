<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>{{config('app.name')}}</title>
    </head>


    <!-- owners only layout -->
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">{{config('app.name')}}</a>
        <ul class="navbar-nav mr-auto">

            <!-- foreach to get ID and name of tthe current user -->
        @foreach ($arr as $ar)
                <li class="nav-item">
                    <span class="nav-link ">ID: {{$ar->id}}</span>
                </li>
                <li class="navbar-item">
                    <span class="nav-link ">{{$ar->name}} {{$ar->lastname}}</span>
                </li>
        @endforeach
        </ul>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/owner">Mis cobros</a>
            </li>
                <span class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Pagos
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/ownerpayments/{{$ar->id}}">Por nombre</a>
                        <a class="dropdown-item" href="/ownerpaymentsbydate">Por fecha</a>
                    </div>
                </span>

            <span class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    Registrar
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/registration/create">Registrar usuario</a>
                    <a class="dropdown-item" href="/charge/create">Registrar cobro</a>
                    <a class="dropdown-item" href="/payment/create">Registrar pago</a>
                </div>
            </span>

        </ul>
        <ul class="navbar-nav  mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/flush2">Cerrar sesión</a>
            </li>
        </ul>

        </nav>
        <main role="main" class="container">
            @include('inc.messages')
            @yield('content') <!-- makes this layout extendible for external views -->
        </main>
    </body>
</html>