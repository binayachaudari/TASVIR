@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header"><h5 class="text-center">Registration</h5></div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="name" class="col-md-3 control-label{{ $errors->has('name') ? ' text-danger' : '' }}">Name:</label>

                            <div class="col-md-8">
                                <input id="name" placeholder="Your Name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                           <label for="username" class="col-md-3 control-label{{ $errors->has('username') ? ' text-danger' : '' }}">Username:</label>
                           <div class="col-md-8">
                               <input id="username" placeholder="Username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>
                               @if ($errors->has('username'))
                                   <span class="text-danger">
                                       <strong>{{ $errors->first('username') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 control-label{{ $errors->has('email') ? ' text-danger' : '' }}">E-Mail Address:</label>

                            <div class="col-md-8">
                                <input id="email" placeholder="Email Address" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 control-label{{ $errors->has('password') ? ' text-danger' : '' }}">Password:</label>

                            <div class="col-md-8">
                                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 control-label">Confirm Password:</label>

                            <div class="col-md-8">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
