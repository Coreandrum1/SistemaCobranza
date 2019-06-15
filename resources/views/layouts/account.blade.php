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

    <body>
        <nav class="navbar bg-light border">
        <span class="navbar-brand">{{config('app.name')}}</span>
        @foreach ($arr as $ar)
            <span class="nav-link text-success">ID: {{$ar->id}}</span>
            <span class="nav-link text-success">{{$ar->name}} {{$ar->lastname}}</span>
        @endforeach
        
        <span class="navbar">
            <a class="nav-link" href="/owner">Mis cobros</a>
        </span>
        <span class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Pagos
            </a>
            <div class="dropdown-menu">
                <a class="nav-link" href="/ownerpayments/{{$ar->id}}">Por nombre</a>
                <a class="nav-link" href="/ownerpaymentsbydate">Por fecha</a>
            </div>
        </span>
        <span class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Registrar
            </a>
            <div class="dropdown-menu">
                <a class="nav-link" href="/registration/create">Registrar usuario</a>
                <a class="nav-link" href="/charge/create">Registrar cobro</a>
                <a class="nav-link" href="/payment/create">Registrar pago</a>
            </div>
        </span>
        <span class="navbar">
            <a class="nav-link" href="/flush2">Cerrar sesión</a>
        </span>
        </nav>


        

        <main role="main" class="container">
            @include('inc.messages')
            @yield('content')
        </main>
    </body>
</html>