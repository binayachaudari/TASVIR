@if(Auth::user()->id==$users->id)
  <a class="btn btn-sm btn-outline-secondary" href="/{{$album->id}}/editAlbum">Edit</a>
@endif
