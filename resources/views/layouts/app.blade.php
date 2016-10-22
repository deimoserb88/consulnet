<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>[ConsulNet] la Web de los consultarios médicos</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ url('assets/vendor/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/vendor/bootstrap/dist/css/bootstrap-theme.min.css') }}" rel="stylesheet">    
    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    @yield('estilos') <!--Para agregar estilos propios de cada modulo-->

    <style>
        body {
            font-family: 'Lato';
            background-image: url({{ url('images/consulnet.jpg') }});
            background-size: cover;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container" style="width: 100%;">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('images/logo.png') }}" class="img-thumbnail">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-btn fa-home"></i>Inicio</a></li>                                       
                    @if (Auth::user())
                    <li class="dropdown">
                        <a href="#"class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-btn fa-calendar"></i>Citas<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a class="link" href="{{ url('citas/citanueva') }}"><i class="fa fa-btn fa-check"></i> Nueva cita </a></li>
                            @if (Auth::user()->priv <= 3)
                            <li><a class="link" href="{{ url('citas/citalistado') }}"><i class="fa fa-btn fa-bars"></i> Listado citas </a></li>
                            <li><a class="link" href="{{ url('citas/citaestatus') }}"><i class="fa fa-btn fa-check-square-o"></i> Estatus de citas </a></li>
                            @endif
                        </ul>

                    </li>
                    @endif
                    
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Iniciar sesión</a></li>
                        <li><a href="{{ url('/register') }}">Registrarse</a></li>
                    @else                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-btn fa-user"></i>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                @if(Auth::user()->priv == 0)
                                    <li><a href="{{ url('/usuarios') }}"><i class="fa fa-btn fa-users"></i>Usuarios</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    
    <!-- JavaScripts -->
    <script src="{{ url('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('assets/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>    
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    @yield('scripts') <!--Para agregar scripts propios de cada modulo-->

</body>
</html>
