@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-7">
         <div class="card text-center">
            <div class="card-header">
               <h3 class="text-center">
               Reset Password
               <h3>
            </div>
            <div class="card-body">
               <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                  {{ csrf_field() }}
                  <input type="hidden" name="token" value="{{ $token }}">
                  <div class="form-group">
                     <label for="email" class="col-md-4 control-label{{ $errors->has('email') ? ' text-danger' : '' }}">E-Mail Address:</label>
                     <div class="col-md-8">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                        <span class="text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="password" class="col-md-4 control-label{{ $errors->has('password') ? ' text-danger' : '' }}">Password:</label>
                     <div class="col-md-8">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                        <span class="text-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="password-confirm" class="col-md-4 control-label{{ $errors->has('password_confirmation') ? ' text-danger' : '' }}">Confirm Password</label>
                     <div class="col-md-8">
                        <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                        @if ($errors->has('password_confirmation'))
                        <span class="text-danger">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="form-group text-center">
                     <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                        Reset Password
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
