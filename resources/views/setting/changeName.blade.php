<div class="container mt-5">
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <div class="card text-center bg-light">
        <div class="card-header">
          <h5 class="text-center">Change Name</h5>
          <hr>
          <div class="card-body">
      @include('layouts.messages')
            <form class="horizontal" action="{{route('changeName')}}" method="POST">
              {{ csrf_field() }}
              <div class="form-group row">
                <label for="name" class="col-md-3 control-label{{ $errors->has('name') ? ' text-danger' : '' }}">Name: </label>
                <div class="col-md-9">
                  <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"  value="{{ old('username') }}" placeholder="New Name" required>
                  @if ($errors->has('name'))
                  <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                  @endif
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-md-3 control-label{{ $errors->has('password') ? ' text-danger' : '' }}">Password: </label>
                <div class="col-md-9">
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
                    Change Name
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
