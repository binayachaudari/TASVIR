<!-- Settings -->
@if (session('user_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  {{ session('user_success') }}
</div>
@endif
<!-- Profile -->
@if ($errors->has('avatar'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  <strong>{{ $errors->first('avatar') }}</strong>
</div>
@endif
<!-- Success -->
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  <strong>{{ session('success') }}</strong>
</div>
@endif
<!-- Warning -->
@if (session('warning'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  <strong>{{ session('warning') }}</strong>
</div>
@endif
<!-- Error -->
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  {{ session('error') }}
</div>
@endif
<!-- Name success settings->changeName -->
@if (session('name_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  {{ session('name_success') }}
</div>
@endif
<!-- Errors on albums page -->
<!-- Albums -->
@if ($errors->has('cover_img'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  <strong>{{ $errors->first('cover_img') }}</strong>
</div>
@endif
@if ($errors->has('title'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  <strong>{{ $errors->first('title') }}</strong>
</div>
@endif
@if ($errors->has('description'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  <strong>{{ $errors->first('description') }}</strong>
</div>
@endif
