@if(Auth::user()->id == $users->id)
<form enctype="multipart/form-data" action="{{ url('/updateAvatar') }}" method="POST">
  <label>Update Your Profile Image: </label>
  <input class="btn" type="file" name="avatar">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="text-right"><br>
    <button type="submit" class="btn btn-outline-primary btn-sm mx-1">Update Avatar</button>
    <button formaction="{{ url('/deleteAvatar') }}"class="btn btn-outline-danger btn-sm mx-1">Delete Avatar</button>
    <a class="btn btn-outline-info btn-sm mx-1" href="{{ url('setting') }}"><i class="fa fa-user-cog" aria-hidden="true"></i>
      Update Your Info</a>
  </div>
</form>
@endif
