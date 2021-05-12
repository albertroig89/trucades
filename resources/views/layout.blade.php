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

      <!-- Bootstrap core CSS -->


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" integrity="sha256-BJ/G+e+y7bQdrYkS2RBTyNfBHpA9IuGaPmf9htub5MQ=" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css"/>
      <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen" /> <!--ESTILS PROPIS-->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.8/push.min.js"></script>
      <!-- Bootstrap core CSS END-->

    <!-- Favicons -->
{{--    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">--}}
{{--    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">--}}
{{--    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">--}}
{{--    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">--}}
{{--    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">--}}
{{--    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">--}}
{{--    <meta name="theme-color" content="#7952b3">--}}

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
                    <a class="dropdown-item" href="{{ route('jobs.index') }}">Mostrar feines</a>
                    <a class="dropdown-item" href="{{ route('jobs.create') }}">Nova feina</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('jobs.index') }}">Mostrar totes les feines</a>
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
                    <a class="dropdown-item" href="{{ route('clients.create') }}">Nou client</a>
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
            <ul class="nav navbar-nav">
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
<script>
    window.onload = function() {
        Push.Permission.request();
    }
</script>
<script>
    Push.create('Hello World!')
</script>
<!-- Begin page content -->
<main class="flex-shrink-0">

        <div class="pt-5 mt-2 col-12">
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
</main>

<footer class="footer mt-auto py-3 bg-light">
  <div class="container">
    <span class="text-muted">Desarrollat per Albert Roig</span>
  </div>
</footer>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>


  <script>
      jQuery(document).ready(function($){
          $(document).ready(function() {
              $('.selector-clients').select2();
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
  <script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/
      $.datetimepicker.setLocale('es');

      $('#datetimepicker_format').datetimepicker({value:'15/04/2015 05:03', format: $("#datetimepicker_format_value").val()});
      console.log($('#datetimepicker_format').datetimepicker('getValue'));

      $("#datetimepicker_format_change").on("click", function(e){
          $("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
      });
      $("#datetimepicker_format_locale").on("change", function(e){
          $.datetimepicker.setLocale($(e.currentTarget).val());
      });

      $('#datetimepicker').datetimepicker({
          dayOfWeekStart : 1,
          lang:'en',
          disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
          startDate:	'1986/01/05'
      });
      $('#datetimepicker').datetimepicker({value:'2015/04/15 05:03', step:10});

      $('.some_class').datetimepicker();

      $('#default_datetimepicker').datetimepicker({
          formatTime:'H:i',
          formatDate:'d.m.Y',
          //defaultDate:'8.12.1986', // it's my birthday
          defaultDate:'+03.01.1970', // it's my birthday
          defaultTime:'10:00',
          timepickerScrollbar:false
      });

      $('#datetimepicker10').datetimepicker({
          step:5,
          inline:true
      });

      $('#datetimepicker_mask').datetimepicker({
          format:'d/m/Y H:i',
          mask:'39/19/9999 29:59'
      });

      $('#datetimepicker_mask2').datetimepicker({
          format:'d/m/Y H:i',
          mask:'39/19/9999 29:59'
      });

      $('#datetimepicker1').datetimepicker({
          datepicker:false,
          format:'H:i',
          step:5
      });
      $('#datetimepicker2').datetimepicker({
          yearOffset:222,
          lang:'ch',
          timepicker:false,
          format:'d/m/Y',
          formatDate:'Y/m/d',
          minDate:'-1970/01/02', // yesterday is minimum date
          maxDate:'+1970/01/02' // and tommorow is maximum date calendar
      });
      $('#datetimepicker3').datetimepicker({
          inline:true
      });
      $('#datetimepicker4').datetimepicker();
      $('#open').click(function(){
          $('#datetimepicker4').datetimepicker('show');
      });
      $('#close').click(function(){
          $('#datetimepicker4').datetimepicker('hide');
      });
      $('#reset').click(function(){
          $('#datetimepicker4').datetimepicker('reset');
      });
      $('#datetimepicker5').datetimepicker({
          datepicker:false,
          allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00'],
          step:5
      });
      $('#datetimepicker6').datetimepicker();
      $('#destroy').click(function(){
          if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
              $('#datetimepicker6').datetimepicker('destroy');
              this.value = 'create';
          }else{
              $('#datetimepicker6').datetimepicker();
              this.value = 'destroy';
          }
      });
      var logic = function( currentDateTime ){
          if (currentDateTime && currentDateTime.getDay() == 6){
              this.setOptions({
                  minTime:'11:00'
              });
          }else
              this.setOptions({
                  minTime:'8:00'
              });
      };
      $('#datetimepicker7').datetimepicker({
          onChangeDateTime:logic,
          onShow:logic
      });
      $('#datetimepicker8').datetimepicker({
          onGenerate:function( ct ){
              $(this).find('.xdsoft_date')
                  .toggleClass('xdsoft_disabled');
          },
          minDate:'-1970/01/2',
          maxDate:'+1970/01/2',
          timepicker:false
      });
      $('#datetimepicker9').datetimepicker({
          onGenerate:function( ct ){
              $(this).find('.xdsoft_date.xdsoft_weekend')
                  .addClass('xdsoft_disabled');
          },
          weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
          timepicker:false
      });
      var dateToDisable = new Date();
      dateToDisable.setDate(dateToDisable.getDate() + 2);
      $('#datetimepicker11').datetimepicker({
          beforeShowDay: function(date) {
              if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
                  return [false, ""]
              }

              return [true, ""];
          }
      });
      $('#datetimepicker12').datetimepicker({
          beforeShowDay: function(date) {
              if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
                  return [true, "custom-date-style"];
              }

              return [true, ""];
          }
      });
      $('#datetimepicker_dark').datetimepicker({theme:'dark'})
  </script>
</html>
