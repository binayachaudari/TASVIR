@extends('layouts.app')
@section('content')
<div class="container mt-5">
<div class="row justify-content-md-center">
  <div class="col-md-6">
    <div class="card bg-light mt-5">
      <div class="card-header">
        <h5 class="text-center">
        Login
        <h5>
      </div>
      <div class="card-body">
        <!-- Custom element: Alert message-->
        @include('layouts.messages')
        <!-- Alert message ends -->
        <div class="card-body text-center">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="email" class="col-md-8 control-label {{ $errors->has('email') ? ' text-danger' : '' }}">E-Mail Address or Username:</label>
              <div class="col-md-12">
                <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail Address or Username" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-md-8 control-label{{ $errors->has('password') ? ' text-danger' : '' }}">Password:</label>
              <div class="col-md-12">
                <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <div class="checkbox">
                  <label>
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary">
                <i class="fas fa-sign-in-alt"></i>
                Login
                </button><br>
                <a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
