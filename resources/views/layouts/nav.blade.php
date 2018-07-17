<nav class="navbar navbar-expand-lg navbar-light bg-light" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="{{url('/')}}">TΛSVIR</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        @if (Auth::guest())
        <li class="nav-item">
          <a class="nav-link" href="{{ url('discover') }}">
          <i class="fas fa-lg fa-globe-asia"></i>
          Discover</a>
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}"><i class="fas fa-lg fa-sign-in-alt"></i><span> </span>LOGIN</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}"><i class="fas fa-lg fa-user-plus"></i><span> </span>REGISTER</a></li>
        @else
        <li class="nav-item my-2">
          <a class="nav-link" href="{{ url('discover') }}">
          <i class="fas fa-lg fa-globe-asia"></i>
          Discover</a>
        </li>
        <li class="nav-item my-2">
          <a class="nav-link" href="{{ url(Auth::user()->username.'/createAlbum') }}">
          <i class="far fa-lg fa-images"></i>
          Add Albums</a>
        </li>
        <li class="nav-item my-2">
          <a class="nav-link" href="{{url(Auth::user()->username.'/showAllalbums')}}">
          <i class="far fa-lg fa-image"></i>
          Upload Photos</a>
        </li>
      </ul>
      <div class="dropdown text-center">
        <button class="btn btn-outline-success btn-sm my-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        @endif
      </div>
    </div>
  </div>
</nav>
