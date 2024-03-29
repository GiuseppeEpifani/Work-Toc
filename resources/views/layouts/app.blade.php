<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Work Toc</title>

  <!-- Scripts -->
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/estilo_menu.css') }}" rel="stylesheet">
  <link href="{{ asset('css/estilo_card.css') }}" rel="stylesheet">
  <link href="{{ asset('css/introLoader/introLoader.min.css') }}" rel="stylesheet">
  <link href=" https://cdn.datatables.net/responsive/2.2.4/css/responsive.bootstrap.min.css" rel="stylesheet">


  @yield('css_dataTable')
  @yield('css')
</head>

<body>
  <div id="app">
    @auth
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container">

        <ul class="navbar-nav ">
          <li class="nav-item active a_menu d-none d-md-block">
            <a class="nav-link " href="{{url('/usuario')}}">Activar Usuarios <span class="sr-only"></span></a>
          </li>

          <li class="nav-item  a_menu d-none d-md-block">
            <a class="nav-link" href="{{route('todos_los_usuarios')}}">Usuarios <span class="sr-only"></span></a>
          </li>

          <li class="nav-item a_menu d-none d-md-block">
            <a class="nav-link" href="{{route('usuarios_trabajador.listado_trabajos')}}">Registro de Trabajos <span
                class="sr-only"></span></a>
          </li>


          @if (Auth::user()->email=="giuseppe@gmail.com")
          <li class="nav-item a_menu d-none d-md-block">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Nuevo Admin') }}</a>
          </li>
          @endif

        </ul>



        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" v-pre>
              <i class="fas fa-user-shield" style="font-size: 16px; margin-right: 5px;"></i> {{ Auth::user()->name }}
              <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
              style="background: #85bb70 !important;">
              <a class="dropdown-item d-md-none a_reponsivo" href="{{url('/usuario')}}">Activar
                Usuarios
                <span class="sr-only"></span></a>
              <a class="dropdown-item d-md-none a_reponsivo" href="{{route('todos_los_usuarios')}}">Usuarios <span
                  class="sr-only"></span></a>
              <a class="dropdown-item d-md-none a_reponsivo"
                href="{{route('usuarios_trabajador.listado_trabajos')}}">Registro de
                Trabajos <span class="sr-only"></span></a>
              @if (Auth::user()->email=="giuseppe@gmail.com")
              <a class="dropdown-item d-md-none a_reponsivo" href="{{ route('register') }}">{{ __('Nuevo Admin') }}</a>
              @endif
              <a class="dropdown-item" style="color: #ffffff !important; width: 100px !important;"
                href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                {{ __('Cerrar Sesión') }} <i class="fas fa-sign-out-alt"></i>
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    @endauth
    <main class="py-4">
      @yield('content')
    </main>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.js "></script>
  <script src="{{ asset('js/introLoader/jquery.introLoader.pack.min.js') }}"></script>
  <script>
    $(document).ready(function($){
   if ($(window).width() <= 770) {
    $('.label_icon').hide();

   
     } else if ($(window).width() > 900) {
      $('.label_icon').show();

    }else if ($(window).width() <= 500) {
      $('.label_icon').hide();
    }

  });

  $(window).resize(function(){
      if ($(window).width() <= 770) {
        $('.label_icon').hide();
    
       } else if ($(window).width() > 900) {
      $('.label_icon').show();
     
      } 

    });
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
  <script src="https://kit.fontawesome.com/cc66cadfbc.js" crossorigin="anonymous"></script>


  @yield('script_dataTable')
  @yield('script')
</body>

</html>