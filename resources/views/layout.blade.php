<!doctype html>
<html lang="es" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - Microdelta</title>

      <!-- Bootstrap core CSS -->


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css"/>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

      <!-- Bootstrap core CSS END-->

      <!--ESTILS PROPIS-->
      <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}" media="screen" />

      <!-- Favicons -->
      <link  rel="icon"   href="{{ asset('/images/favicon.png') }}" type="image/png" />




  </head>
  <body class="d-flex flex-column h-100">
    
<header>

  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
{{--  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">--}}
    <div class="container-fluid">
      <a class="navbar-brand logolink" href="{{ route('home') }}"><img class="logo" src="{{ asset('/images/logo.png') }}"/></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item dropdown">
                <button type="button" onclick="location.href = '{{ route('calls.create') }}'" class="btn btn-primary">+</button>
            </li>
            <li class="nav-item dropdown ml-2">
                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" onclick="location.href = '{{ route('jobs.create') }}'" class="btn btn-primary">Feina +</button>
                    <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                            <a class="dropdown-item" href="{{ route('jobs.index') }}">Mostrar feines</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('jobs.histjobs') }}">Mostrar feines del historic</a>
                            @if (auth()->user()->name === "Albert Roig")
                                <a class="dropdown-item" href="{{ route('jobs.histjobs2') }}">Mostrar historic ocult</a>
                                <a class="dropdown-item" href="{{ route('jobs.count') }}">Contador de feines</a>
                            @endif
                        </div>
                    </div>
                </div>
            </li>
            @if (auth()->user()->department->title === "Administracio" or auth()->user()->name === "Albert Roig")
                <li class="nav-item dropdown ml-2">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" onclick="location.href = '{{ route('users.index') }}'" class="btn btn-primary">Usuaris</button>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                                <a class="dropdown-item" href="{{ route('users.create') }}">Nou usuari</a>
                            </div>
                        </div>
                    </div>
                </li>
            @endif
            @if (auth()->user()->department->title === "Administracio" or auth()->user()->name === "Albert Roig")

                <li class="nav-item dropdown ml-2">
                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" onclick="location.href = '{{ route('clients.index') }}'" class="btn btn-primary">Clients</button>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                                <a class="dropdown-item" href="{{ route('clients.create') }}">Nou client</a>
                                @if (auth()->user()->name === "Albert Roig")
                                    <a class="dropdown-item" href="{{ route('clients.import') }}">Importar Clients</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>

            @else
                <li class="nav-item dropdown">
                    <button type="button" onclick="location.href = '{{ route('clients.index') }}'" class="btn btn-primary ml-2">Clients</button>
                </li>
            @endif
        </ul>
      </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav login">
                <!-- Authentication Links -->
                @guest
                    <li><a class="loginlink" href="{{ route('login') }}">Login</a></li>
                                                <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                @if (auth()->user()->department->title !== "Administracio" and auth()->user()->name !== "Albert Roig")
                                    <a class="dropdown-item" href="{{ route('users.edit', ['id' => auth()->id()]) }}">Editar el teu usuari</a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Sortir
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

        <div class="pt-5 mt-2 col-12">
           @yield('content')

        </div>
</main>

<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted">Desarrollat per Albert Roig</span>
  </div>
</footer>
  </body>

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>

{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.js"></script>--}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>

{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.8/push.min.js"></script>--}}



  <script>
      $('.pagination li').addClass('page-item');
      $('.pagination li a').addClass('page-link');
      $('.pagination span').addClass('page-link');
  </script>


  <script>
      $(function(){
          $('.select2').select2({
              placeholder: "Selecciona un client o escriu-lo"
          }).on('change', function(e) {
              var data = $(".select2 option:selected").text();
              $("#clientname").val(data);
              $("#clientphone").prop("disabled", true);
          });
      });
  </script>

  <script>
      $(document).ready(function() {
          $("#add_phone").click(function(){
              var contador = $("input[type='text']").length;

              $(this).before('<div><label for="phones'+ contador +'">Telèfon:</label><input type="text" class="form-control" aria-describedby="clientHelp" placeholder="977 70 70 70" id="phones'+ contador +'" name="phones[]"/><br><button type="button" class="btn btn-default delete_phone float-right">Borrar telèfon</button></div>');
          });
          $(document).on('click', '.delete_phone', function(){
              $(this).parent().remove();
          });
      });
  </script>
  <script>
      $.datetimepicker.setLocale('es');

      $('#inittime').datetimepicker({
          format:'d-m-y H:i',
          mask:'39-19-99 29:59'
      });

      $('#endtime').datetimepicker({
          format:'d-m-y H:i',
          mask:'39-19-99 29:59'
      });

      $('#inittime2').datetimepicker({
          format:'d-m-y H:i',
      });

      $('#endtime2').datetimepicker({
          format:'d-m-y H:i',
      });
  </script>
</html>
