<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'TASVIR') }}</title>
  <!-- Styles -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <!-- Pace core CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/black/pace-theme-flash.min.css" />

  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <style>
    .card {
      margin: 5rem 0;
    }
  </style>
</head>

<body>
  <div id="app">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{url('/')}}">TΛSVIR</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            @if (Auth::guest())
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i><span> </span>LOGIN</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i><span> </span>REGISTER</a></li>
            @else
            <div class="dropdown">
              <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="floted-left rounded-circle" src="/uploads/avatars/{{Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" width="32" height="32">
                        {{ Auth::user()->name}}
                        </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item text-center" href="#">
                SIGNED IN AS: <br>
              <strong>{{ Auth::user()->username }}</strong>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url(Auth::user()->username) }}">
                  <i class="fa fa-user" aria-hidden="true"></i>
                MY PROFILE
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('setting') }}">
                  <i class="fa fa-user-cog" aria-hidden="true"></i>
                           SETTINGS
                           </a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class="fas fa-sign-out-alt"></i>
                           LOGOUT
                           </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </div>
              @endif
          </ul>
          </div>
        </div>
      </div>
    </nav>
    @yield('content')
  </div>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
  <!-- <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script> -->
  <!-- Pace core JavaScript -->
  <script data-pace-options='{ "ajax": false }' src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
  <!-- Custom scripts for this template -->
  <script src="{{ asset('js/creative.js') }}"></script>
  <!-- Scripts -->
  <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>

</html>
