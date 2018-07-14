<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <Title>{{config('app.name','TASVIR')}}</Title>
    <!-- Pace core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/black/pace-theme-flash.min.css" />
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Plugin CSS -->
    <link href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/creative.css') }}" rel="stylesheet">
  </head>
  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">TΛSVIR</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Discover</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
          @if (Auth::guest())
          <form class="form-inline my-2 my-lg-0">
            <a class="btn btn-outline-success my-2" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i><span> </span></i><span> </span> Login</a>
          </form>
          @else
          <div class="dropdown">
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
              <!-- User profile href -->
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
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
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
    <!--
      <header class="masthead text-center text-white d-flex">
        <div class="container my-auto">
          <div class="row">
            <div class="col-lg-10 mx-auto">
              <h1 class="text-uppercase">
                <strong>Your Favorite Source of Free Bootstrap Themes</strong>
              </h1>
      <hr>
            </div>
            <div class="col-lg-8 mx-auto">
              <p class="text-faded mb-5">Start Bootstrap can help you build better websites using the Bootstrap CSS framework! Just download your template and start going, no strings attached!</p>
              <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
            </div>
          </div>
        </div>
      </header>
      -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item bg bg1 active">
          <div class="container">
            <div class="carousel-caption">
              <h1>“The best thing about a picture is that it never changes, even when the people in it do.”</h1>
              <p>– Andy Warhol</p>
            </div>
          </div>
        </div>
        <div class="carousel-item bg bg2">
          <div class="container">
            <div class="carousel-caption">
              <h1>“Skill in photography is acquired by practice and not by purchase.”</h1>
              <p>- Percy W. Harris</p>
            </div>
          </div>
        </div>
        <div class="carousel-item bg bg3">
          <div class="container">
            <div class="carousel-caption">
              <h1>“All photographs are accurate. None of them is the truth.”</h1>
              <p>– Richard Avedon</p>
            </div>
          </div>
        </div>
        <div class="carousel-item bg bg4">
          <div class="container">
            <div class="carousel-caption">
              <h1>“I really believe there are things nobody would see if I didn’t photograph them.”</h1>
              <p>— Diane Arbus</p>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" data-slide="next">
      <span class="carousel-control-next-icon"></span>
      </a>
    </div>
    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Wiki Loves Earth in Nepal! (Event)</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">Wiki Loves Earth is an international photographic competition to promote natural heritage sites around the World through Wikimedia projects. </p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="{{ url('/discover') }}">Get Started!</a>
          </div>
        </div>
      </div>
    </section>
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">At Your Service</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="far fa-4x fa-gem text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Sturdy Templates</h3>
              <p class="text-muted mb-0">Our templates are updated regularly so they don't break.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Ready to Ship</h3>
              <p class="text-muted mb-0">You can use this theme as is, or you can make changes!</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="far fa-4x fa-newspaper text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Up to Date</h3>
              <p class="text-muted mb-0">We update website to keep things fresh.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
              <h3 class="mb-3">Made with Love</h3>
              <p class="text-muted mb-0">You have to make your websites with love these days!</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="bg-dark text-white">
      <div class="container text-center">
        <h2 class="mb-4">Free Sign Up at Tasvir</h2>
        <hr class="light my-4">
        <a class="btn btn-light btn-xl sr-button" href="register">SIGN UP</a>
      </div>
    </section>
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">This is a website for all Nepalese interested in photography. Keep an open mind, ask questions, seek for feedback, share what you know, share what you think might help the members. We are all learning and such practice helps us grow individually as well as a community. </p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <i class="fab fa-facebook-f fa-3x mb-3 sr-contact"></i>
            <p>
              <a target="_blank" href="https://www.facebook.com/groups/Nepalese.In.Photography/">Nepalese in Photography</a>
            </p>
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <i class="fas fa-envelope fa-3x mb-3 sr-contact"></i>
            <p>
              <a target="_blank" href="mailto:binayachaudari@gmail.com">contact@tasvir.com</a>
            </p>
          </div>
        </div>
      </div>
    </section>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mx-auto text-center">
          <p>
            Made with <span style="color: #e25555;">&#9829;</span> in NEPAL
            <br>
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
          </p>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Plugin JavaScript -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('vendor/scrollreveal/scrollreveal.min.js') }}"></script>
    <!-- <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script> -->
    <!-- Pace core JavaScript -->
    <script data-pace-options='{ "ajax": false }' src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/creative.js') }}"></script>
  </body>
</html>
