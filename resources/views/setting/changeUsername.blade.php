<div class="container mt-5">
  <div class="row justify-content-md-center">
    <div class="col-md-7">
      <div class="card text-center bg-light">
        <div class="card-header">
          <h5 class="text-center">Change Username</h5>
          <hr>
          <div class="card-body">
        @include('layouts.messages')
            <form class="horizontal" action="{{ route('changeUsername') }}" method="POST">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="username" class="col-md-4 control-label{{ $errors->has('username') ? ' text-danger' : '' }}">Username: </label>
                <div class="col-md-8">
                  <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="New Username" required>
                  @if ($errors->has('username'))
                  <span class="invalid-feedback">
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
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="form-group text-center mt-4">
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary">
                    <i class="fas fa-user-edit"></i>
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
