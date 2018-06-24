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

      <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
      <style>
         .card{
         margin: 5rem 0;
         }
      </style>
   </head>
   <body>
      <div id="app">
         <!-- Navigation -->
         <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container">
               <a class="navbar-brand js-scroll-trigger" href="/">TΛSVIR</a>
               <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                     @if (Auth::guest())
                     <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">LOGIN</a></li>
                     <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">REGISTER</a></li>
                     @else
                     <div class="dropdown">
                        <button class="btn btn-success my-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                           <a class="dropdown-item" href="{{ url('setting') }}">
                           SETTINGS
                           </a>
                           <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
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
      <!-- Custom scripts for this template -->
      <script src="{{ asset('js/creative.js') }}"></script>
      <!-- Scripts -->
      <!-- <script src="{{ asset('js/app.js') }}"></script> -->
   </body>
</html>
