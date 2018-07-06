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
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
      <!-- Plugin CSS -->
      <link href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
      <!-- Bootstrap core JavaScript -->
      <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
      <!-- Pace core CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/black/pace-theme-flash.min.css" />
      <!-- Custom styles for this template -->
      <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
      <!-- Ajax -->
      <script>
        //Keep current page active on page reload
        //This event fires on tab show, but before the new tab has been shown.
         $(document).ready(function(){
             $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                 localStorage.setItem('activeTab', $(e.target).attr('href'));
             });
             var activeTab = localStorage.getItem('activeTab');
             if(activeTab){
                 $('#myTab a[href="' + activeTab + '"]').tab('show');
             }

             // @if(count($errors)>0)
             // $('#Error').modal('show');
             // @endif

         });



      </script>
   </head>
   <body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light" id="mainNav">
             <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="{{url('/')}}">TΛSVIR</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button> <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                 <!-- Items on right side -->
                 @if (Auth::guest())
                 <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i><span> </span>LOGIN</a></li>
                 <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus"></i><span> </span>REGISTER</a></li>
                 @else

                 <div class="dropdown text-center">
                   <button class="btn btn-outline-success my-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img class="floted-left rounded-circle" src="/uploads/avatars/{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}" width="32" height="32">

                     {{ Auth::user()->name }}
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
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                     <i class="fas fa-sign-out-alt"></i>
                     LOGOUT
                   </a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}
                   </form>
                 </div>
               </div>
                 @endif
            </ul>
           </div>
         </div>
       </div>
     </nav>

     <div class="container mt-3">
       @if (session('success'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          <strong>{{ session('success') }}</strong>
       </div>
       @endif
       @if (session('warning'))
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
          <strong>{{ session('warning') }}</strong>
       </div>
       @endif
      <div class="row mt-3">
        <div class="col-md-2">
          <img class="floted-left rounded-circle" src="/uploads/avatars/{{ $users->avatar }}" alt="{{ $users->name }}" width="150" height="150">
        </div>
        <div class="col-md-10">
          <h4 class="display-4">{{ $users->name }}</h4>
          <h5 class="display-6 text-muted"> Username: {{ $users->username }}</h5>
          @if(!Auth::guest())
          <form enctype="multipart/form-data" action="{{ url('/updateAvatar') }}" method="POST">
            <label>Update Profile Image</label><br>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="text-right">
              <button type="submit" class="btn btn-outline-primary btn-sm mx-1">Update Avatar</button>
              <button type="submit" formaction="{{ url('/deleteAvatar') }}"class="btn btn-outline-danger btn-sm mx-1">Delete Avatar</button>
              <a class="btn btn-outline-info btn-sm mx-1" href="{{ url('setting') }}"><i class="fa fa-user-cog" aria-hidden="true"></i>
                Update Your Info</a>
            </div>
          </form>
          @endif
        </div>
      </div>
      <hr>
    </div>

      <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <!-- Plugin JavaScript -->
      <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
      <!-- Pace core JavaScript -->
      <script data-pace-options='{ "ajax": false }' src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
      <script src="{{ asset('vendor/scrollreveal/scrollreveal.min.js') }}"></script>
      <!-- <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script> -->
   </body>
</html>
