<div class="container mt-5">
   <div class="row justify-content-md-center">
      <div class="col-md-7">
         <div class="card text-center bg-light">
            <div class="card-header">
               <h5 class="text-center">Change Username</h5>
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
                  <form class="horizontal" action="{{ route('changeUsername') }}" method="POST">
                     {{ csrf_field() }}
                     <div class="form-group row">
                        <label for="username" class="col-md-4 control-label{{ $errors->has('username') ? ' text-danger' : '' }}">Username: </label>
                        <div class="col-md-8">
                           <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="New Username" required>
                           @if ($errors->has('username'))
                           <span class="text-danger">
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
                           <span class="text-danger">
                           <strong>{{ $errors->first('password') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>
                     <div class="form-group text-center mt-4">
                        <div class="col-md-12">
                           <button type="submit" class="btn btn-primary">
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
