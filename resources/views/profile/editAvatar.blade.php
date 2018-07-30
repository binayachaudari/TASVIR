@if(Auth::user()->id == $users->id)
<form enctype="multipart/form-data" action="{{ url('/updateAvatar') }}" method="POST">
  <label>Update Your Profile Image: </label>
  <input class="btn" type="file" name="avatar" accept="image/*">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="text-right"><br>
    <button type="submit" class="btn btn-outline-primary btn-sm mx-1">Update Avatar</button>
    <!-- calls Model-->
    <buttons class="btn btn-outline-danger btn-sm mx-1" data-toggle="modal" data-url="{{ url('/deleteAvatar') }}"  data-target="#delete">
    <i class="fas fa-lg fa-trash-alt"></i>
    Delete Avatar</buttons>
    <a class="btn btn-outline-info btn-sm mx-1" href="{{ url('setting') }}"><i class="fa fa-user-cog" aria-hidden="true"></i>
      Update Your Info</a>
  </div>
</form>

<!-- Delete Model -->
<form action="{{ url('/deleteAvatar') }}" method="POST" class="remove-record">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteLabel">Delete Avatar!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          You Want You Sure Delete Your Avatar?
        <div class="modal-footer">
          <button type="button" class="btn btn-primary remove-data-from-delete-form" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endif
