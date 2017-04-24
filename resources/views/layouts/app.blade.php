<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Cric') }}</title>

  <!-- Styles -->
  <link href="/css/app.css" rel="stylesheet">


  <!-- Scripts -->
  <script>
    window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
  </script>
</head>

<body>
  <div id="app">
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">

          <!-- Collapsed Hamburger -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <!-- Branding Image -->
          <a class="navbar-brand" href="{{ url('/home') }}">
{{ config('app.name', 'Cric') }}
</a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">
            &nbsp; @if (!Auth::guest())
            <li class="Dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Terapia <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/terapista/index">Terapistas</a></li>
                <li><a href="/terapia/index">Terapias</a></li>
                <li><a href="/Patologia/index">Patologia</a></li>
                <li><a href="/Paciente/index">Paciente</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/cita/index">Citas</a></li>
                <li role="separator" class="divider"></li>
                <li>
                  <a href=""></a>
                </li>
              </ul>
            </li>



            <li class="Dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Caja <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/factura">Cobro de Terapias</a></li>
                <li><a href="/egreso?modulo=caja">Egresos de Caja</a></li>
                <li><a href="/ingreso?modulo=caja">Ingresos de Caja</a></li>
                <li><a href="/reporte/caja?fecha={{Carbon\Carbon::now()->format('y/m/Y')}}">Reporte de Caja</a></li>

              </ul>
            </li>
            <li class="Dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bancos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/egreso?modulo=banco">Egresos de Banco</a></li>
                <li><a href="/ingreso?modulo=banco">Ingresos de Banco</a></li>
                <li><a href="/reporte/cheque?fecha={{Carbon\Carbon::now()->format('y/m/Y')}}">Reporte de Cheque</a></li>
                
              </ul>
            </li>

            <li class="Dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contabilidad <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/egresocuentas">Cuenta de Egreso</a></li>
                <li><a href="/ingresocuentas">Cuenta de Ingreso</a></li>
                <li><a href="/reporte/financiero?year={{Carbon\Carbon::now()->year}}">Reporte Financiero</a></li>
              </ul>
            </li>

               <li class="Dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Compras <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/compra">Crear Compras</a></li>
                <li><a href="/proveedores">Proveedores</a></li>
               
              </ul>
            </li>
           
           <li class="Dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Escuela <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/clases">Clases</a></li>
                <li><a href="/grados">Grados</a></li>
                <li><a href="/alumnos">Alumnos</a></li>
                <li><a href="/matriculas">Matricula</a></li>
               
              </ul>
            </li>
           

            @endif
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>

            @else
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
{{ Auth::user()->name }} <span class="caret"></span>
</a>

              <ul class="dropdown-menu" role="menu">
                <li>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
Logout
</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
              </ul>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      @yield('content')
    </div>

  </div>

  <!-- Scripts -->


  <script src="/js/app.js"></script>

  @yield('script') @yield('script-validacion')
</body>


</html>