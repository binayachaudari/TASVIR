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
         });
      </script>
   </head>
   <body>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
         <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="{{url('/')}}">TΛSVIR</a>
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
                     <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
         <div class="container">
            <div class="row justify-content-md-center">
               <div class="col-md-12">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" id="username-tab" data-toggle="tab" href="#username" role="tab" aria-controls="username" aria-selected="true">Change Username</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Change Password</a>
                     </li>
                  </ul>
                  <!-- Commented until ChangeUsername && ChangePassword blade made -->
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="username" role="tabpanel" aria-labelledby="username-tab">
                       <div class="container mt-5">
                          <div class="row justify-content-md-center">
                             <div class="col-md-7">
                                <div class="card text-center bg-light">
                                   <div class="card-header">
                                      <h5 class="text-center">Change Username</h5>
                                      <hr>
                                      <div class="card-body">
                                         @if (session('status'))
                                         <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            {{ session('status') }}
                                         </div>
                                         @endif
                                         @if (session('error'))
                                         <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            {{ session('error') }}
                                         </div>
                                         @endif
                                         <form class="horizontal" action="{{ route('changeUsername') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-group row">
                                               <label for="username" class="col-md-4 control-label{{ $errors->has('username') ? ' text-danger' : '' }}">Username: </label>
                                               <div class="col-md-8">
                                                  <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="New Username" required>
                                                  @if ($errors->has('username'))
                                                  <span class="text-danger">
                                                  <strong>{{ $errors->first('username') }}</strong>
                                                  </span>
                                                  @endif
                                               </div>
                                            </div>
                                            <div class="form-group row">
                                               <label for="password" class="col-md-4 control-label{{ $errors->has('password') ? ' text-danger' : '' }}">Password: </label>
                                               <div class="col-md-8">
                                                  <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                                                  @if ($errors->has('password'))
                                                  <span class="text-danger">
                                                  <strong>{{ $errors->first('password') }}</strong>
                                                  </span>
                                                  @endif
                                               </div>
                                            </div>
                                            <div class="form-group text-center mt-4">
                                               <div class="col-md-12">
                                                  <button type="submit" class="btn btn-primary">
                                                  Change Username
                                                  </button>
                                               </div>
                                            </div>
                                         </form>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                     </div>
                     <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <div class="container mt-5">
                           <div class="row justify-content-md-center">
                              <div class="col-md-7">
                                 <div class="card text-center bg-light">
                                    <div class="card-header">
                                       <h5 class="text-center">Change Password</h5>
                                       <hr>
                                       <div class="card-body">
                                          @if (session('success'))
                                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                             {{ session('success') }}
                                          </div>
                                          @endif
                                          @if (session('error'))
                                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                             <span aria-hidden="true">&times;</span>
                                             </button>
                                             {{ session('error') }}
                                          </div>
                                          @endif
                                          <form class="horizontal" action="{{ route('changePassword') }}" method="POST">
                                             {{ csrf_field() }}
                                             <div class="form-group row">
                                                <label for="current_password" class="col-md-4 control-label{{ $errors->has('currPassword') ? ' text-danger' : '' }}">Current Password: </label>
                                                <div class="col-md-8">
                                                   <input type="password" class="form-control{{ $errors->has('currPassword') ? ' is-invalid' : '' }}" name="currPassword"  placeholder="Currnet Password" required>
                                                   @if ($errors->has('currPassword'))
                                                   <span class="text-danger">
                                                   <strong>{{ $errors->first('currPassword') }}</strong>
                                                   </span>
                                                   @endif
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label for="new_password" class="col-md-4 control-label{{ $errors->has('newPassword') ? ' text-danger' : '' }}">New Password: </label>
                                                <div class="col-md-8">
                                                   <input type="password" class="form-control{{ $errors->has('newPassword') ? ' is-invalid' : '' }}" name="newPassword"  placeholder="New Password" required>
                                                   @if ($errors->has('newPassword'))
                                                   <span class="text-danger">
                                                   <strong>{{ $errors->first('newPassword') }}</strong>
                                                   </span>
                                                   @endif
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label for="newPassword" class="col-md-4 control-label">Confirm Password: </label>
                                                <div class="col-md-8">
                                                   <input type="password" class="form-control" name="newPassword_confirmation" placeholder="Confirm Password" required>
                                                </div>
                                             </div>
                                             <div class="form-group text-center mt-4">
                                                <div class="col-md-12">
                                                   <button type="submit" class="btn btn-primary">
                                                   Change Password
                                                   </button>
                                                </div>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
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
