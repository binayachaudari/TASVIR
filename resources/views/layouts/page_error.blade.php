<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <!-- Styles -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <title>{{ config('app.name', 'TASVIR') }}</title>
  <!-- Pace core CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/black/pace-theme-flash.min.css" />
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>

<body>
  @yield('content')
  <hr>
  <a href="{{url('/')}}" class="btn btn-lg btn-outline-primary"><i class="fa fa-home"></i>
      Take Me Home </a>
  </div>
  </div>
  </div>
  </div>
  <!-- Pace core JavaScript -->
  <script data-pace-options='{ "ajax": false }' src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>
</body>

</html>
