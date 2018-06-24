<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <Title>{{config('app.name','TASVIR')}}</Title>
      <!-- Bootstrap core CSS -->
      <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
      <!-- Custom fonts for this template -->
      <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
      <!-- Plugin CSS -->
      <link href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
      <!-- Bootstrap core JavaScript -->
      <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
      <!-- Custom styles for this template -->
      <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

      <!-- Custom script for this template -->
      <script>
         $(document).ready(function(){
         $("#myTab li a").click(function(e){
           e.preventDefault();
           var url = $(this).attr("data-url");
           var href = this.hash;
           var pane = $(this);

            console.log(url);
            console.log(href);
            console.log(pane);

         // ajax load from data-url
         $(href).load(url,function(result){
         pane.tab('show');
         });

         });
               // load first tab content
         $('#username').load($('.active').attr("data-url"),function(result){
         $('.active').tab('show');
         });

         });
      </script>
   </head>
   <body>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
         <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="/">TΛSVIR</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                  <!-- Items on right side -->
               </ul>
               @if (Auth::guest())
               <form class="form-inline my-2 my-lg-0">
                  <a class="btn btn-outline-success my-2" href="{{ route('login') }}">Login</a>
               </form>
               @else
               <div class="dropdown">
                  <button class="btn btn-success my-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ Auth::user()->name }}
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <a class="dropdown-item" href="{{ url('setting') }}">
                     SETTINGS
                     </a>
                     <div class="dropdown-divider"></div>
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
               </div>
            </div>
         </div>
      </nav>
      <div class="container">
      <h1 class="display-1 text-muted">Settings</h1>
      <div>
      <div class="container">
         <div class="row justify-content-md-center">
            <div class="col-md-12">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="username-tab" data-toggle="tab" href="#username" role="tab" aria-controls="username" aria-selected="true" data-url="">Change Username</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false" data-url="">Change Password</a>
                  </li>
               </ul>
               <!-- Commented until ChangeUsername && ChangePassword blade made -->
               <!-- <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="username" role="tabpanel" aria-labelledby="username-tab"></div>
                  <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab"></div>
                  </div> -->
            </div>
         </div>
      </div>
      <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <!-- Plugin JavaScript -->
      <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
      <script src="{{ asset('vendor/scrollreveal/scrollreveal.min.js') }}"></script>
      <!-- <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script> -->
   </body>
</html>
