
<div class="container mt-5">
  <div class="row justify-content-md-center">
    <div class="col-md-7">
      <div class="card text-center bg-light">
        <div class="card-header">
          <h5 class="text-center">Change Password</h5>
          <hr>
          <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
               {{ session('status') }}
             </div>
             @endif

             @if (session('error'))
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                {{ session('error') }}
              </div>
              @endif

              <form class="horizontal" action="{{ route('changePassword') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group row">
                   <label for="current_password" class="col-md-4 control-label{{ $errors->has('currPassword') ? ' text-danger' : '' }}">Current Password: </label>
                   <div class="col-md-8">
                      <input type="password" class="form-control{{ $errors->has('currPassword') ? ' is-invalid' : '' }}" name="currPassword"  placeholder="Currnet Password" required>
                      @if ($errors->has('currPassword'))
                      <span class="text-danger">
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
                      <span class="text-danger">
                      <strong>{{ $errors->first('newPassword') }}</strong>
                      </span>
                      @endif
                   </div>
                </div>
                <div class="form-group row">
                  <label for="confirm_password" class="col-md-4 control-label{{ $errors->has('conPassword') ? ' text-danger' : '' }}">Confirm Password: </label>
                  <div class="col-md-8">
                     <input type="password" class="form-control{{ $errors->has('conPassword') ? ' is-invalid' : '' }}" name="conPassword" placeholder="Confirm Password" required>
                     @if ($errors->has('conPassword'))
                     <span class="text-danger">
                     <strong>{{ $errors->first('conPassword') }}</strong>
                     </span>
                     @endif
                  </div>
                </div>

                <div class="form-group text-center mt-4">
                   <div class="col-md-12">
                      <button type="submit" class="btn btn-primary">
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
