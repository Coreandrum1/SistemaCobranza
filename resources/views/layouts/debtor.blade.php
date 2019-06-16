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

        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <span class="navbar-brand">{{config('app.name')}}</span>
            <ul class="navbar-nav mr-auto">
                @foreach ($arr as $ar)
                    <li class="nav-item">
                        <span class="nav-link ">ID: {{$ar->id}}</span>
                    </li>
                    <li class="navbar-item">
                        <span class="nav-link ">{{$ar->name}} {{$ar->lastname}}</span>
                    </li>
                @endforeach
            </ul>
            
                <ul class="navbar-nav d-flex justify-content-end">
                    <span class="nav-item">
                        <a class="nav-link" href="/flush2">Cerrar sesión</a>
                    </span>
                </ul>
        </nav>

       

        <div class="container">
                @include('inc.messages')
                @yield('content')
        </div>
        
    </body>
</html>
