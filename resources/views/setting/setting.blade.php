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
  <!-- Navigation -->
  @include('layouts.nav')
<div class="container">
  <h1 class="display-1 text-muted"><i class="fa fa-cog fa-spin" aria-hidden="true"></i><span> </span>Settings</h1>
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="username-tab" data-toggle="tab" href="#username" role="tab" aria-controls="username" aria-selected="true">Change Your Username</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Change Your Password</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="name-tab" data-toggle="tab" href="#name" role="tab" aria-controls="name" aria-selected="false">Change Your Name</a>
          </li>
        </ul>
        <!-- Commented until ChangeUsername && ChangePassword blade made -->
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="username" role="tabpanel" aria-labelledby="username-tab">
            @include('setting.changeUsername')
          </div>
          <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
            @include('setting.changePassword')
          </div>
          <div class="tab-pane fade" id="name" role="tabpanel" aria-labelledby="name-tab">
            @include('setting.changeName')
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
