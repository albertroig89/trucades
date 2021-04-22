<!doctype html>
<html lang="{{ app()->getLocale() }}" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Microdelta</title>

<!-- DATETIMEPICKER BOTSTRAP I JAVASCRIPT-->

<!-- HASTA AQUI DATETIME PICKER -->

      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
      <!-- Bootstrap core CSS END-->

    <!-- Favicons -->
{{--    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">--}}
{{--    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">--}}
{{--    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">--}}
{{--    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">--}}
{{--    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">--}}
{{--    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">--}}
{{--    <meta name="theme-color" content="#7952b3">--}}


    <style>
        /*Estils datetimepicker*/
        .container {
            margin-top: 5px;
            margin-left: 10px;
            width: 600px;
        }
        /*hasta aqui*/
    </style>

    
    <!-- Custom styles for this template -->
{{--    <link href="{{ asset('css/style.css') }}" rel="stylesheet">--}}
  </head>
  <body class="d-flex flex-column h-100">
    
<header>

  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ route('home') }}">Microdelta trucades</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Trucades
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('home') }}">Mostrar trucades</a>
                    <a class="dropdown-item" href="{{ route('calls.create') }}">Nova trucada</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('calls.index') }}">Mostrar totes les trucades</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Feines
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('home') }}">Mostrar feines</a>
                    <a class="dropdown-item" href="{{ route('calls.create') }}">Nova feina</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('jobs.jobs') }}">Mostrar totes les feines</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuaris
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('users.index') }}">Mostrar usuaris</a>
                    <a class="dropdown-item" href="{{ route('users.create') }}">Nou usuari</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Clients
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('clients.index') }}">Mostrar clients</a>
                    <a class="dropdown-item" href="{{ route('users.create') }}">Nou client</a>
                </div>
            </li>

        </ul>
      </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                                                <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
  </nav>
</header>

<!-- Begin page content -->
<main class="flex-shrink-0">

    <div class="row ml-3 mt-5">
        <div class="mt-3 col-12">
           @yield('content')

        </div>
{{--        <div class="mt-3 col-2">--}}

{{--                @section('sidebar')--}}
{{--                    <th><h2>Menu</h2></th>--}}
{{--                @show--}}
{{--                <table>--}}
{{--                    <tr><td><a href="{{ route('jobs.jobs') }}">Feines</a></td></tr>--}}
{{--                    <tr><td><a href="{{ route('home') }}">Trucades</a></td></tr>--}}
{{--                    <tr><td><a href="{{ route('calls.create') }}">Afegir trucada</a></td></tr>--}}
{{--                    <tr><td><a href="{{ route('users.index') }}">Mostrar usuaris</a></td></tr>--}}
{{--                    <tr><td><a href="{{ route('users.create') }}">Crear usuaris</a></td></tr>--}}
{{--                </table>--}}

{{--        </div>--}}

    </div>
</main>

<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted">Desarrollat per Albert Roig</span>
  </div>
</footer>

  </body>
</html>
