<div class="container mt-5">
  <div class="row justify-content-md-center">
    <div class="col-md-7">
      <div class="card text-center bg-light">
        <div class="card-header">
          <h5 class="text-center">Change Password</h5>
          <hr>
          <div class="card-body">
          @include('layouts.messages')
            <form class="horizontal" action="{{ route('changePassword') }}" method="POST">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="current_password" class="col-md-4 control-label{{ $errors->has('currPassword') ? ' text-danger' : '' }}">Current Password: </label>
                <div class="col-md-8">
                  <input type="password" class="form-control{{ $errors->has('currPassword') ? ' is-invalid' : '' }}" name="currPassword"  placeholder="Currnet Password" required>
                  @if ($errors->has('currPassword'))
                  <span class="invalid-feedback">
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
                  <span class="invalid-feedback">
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
                    <i class="fas fa-user-edit"></i>
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
