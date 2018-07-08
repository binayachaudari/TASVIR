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
    <!-- Lightbox CSS-->
    <link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">
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
    @include('layouts.nav')
    <div class="container mt-3">
      @include('layouts.messages')
      <div class="row mt-3">
        <div class="col-lg-2">
          <img class="floted-left rounded-circle" src="/uploads/avatars/{{ $users->avatar }}" alt="{{ $users->name }}" width="150" height="150">
        </div>
        <div class="col-lg-10">
          <h4 class="display-4">{{ $users->name }}</h4>
          <h5 class="display-6 text-muted"> Username: {{ $users->username }}</h5>
          <h5 class="display-6 text-muted"> E-mail: {{ $users->email }}</h5>
          @if(Auth::check())
          @include('profile.editAvatar')
          @endif
        </div>
      </div>
      <br>
      <!-- NAVS -->
      <div class="container">
        <div class="row justify-content-md-center">
          <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              @if(Auth::check())
              @include('profile.userTab')
              @else
              <li class="nav-item">
                <a class="nav-link active" id="albums-tab" data-toggle="tab" href="#albums" role="tab" aria-controls="albums" aria-selected="true">{{ $users->name }}'s Albums</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">{{ $users->name }}'s Photos</a>
              </li>
              @endif
            </ul>
            <br>
            <!-- Commented until ChangeUsername && ChangePassword blade made -->
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="albums" role="tabpanel" aria-labelledby="albums-tab">
                @if(count($albums)>0)
                @include('portfolio.profileAlbum')
                @else
                <br>
                <h3>Album is empty!!</h3>
                @endif
              </div>
              <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                @if(count($photos)>0)
                @include('portfolio.profilePhotos')
                @else
                <br>
                <h3>No Photos!</h3>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Lightbox JavaScript -->
    <script src="{{asset('js/lightbox-plus-jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Plugin JavaScript -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Pace core JavaScript -->
    <script data-pace-options='{ "ajax": false }' src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <script src="{{ asset('vendor/scrollreveal/scrollreveal.min.js') }}"></script>
    <!-- <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script> -->
  </body>
</html>
