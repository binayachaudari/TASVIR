@if(Auth::user()->id==$photo->user->id)
<a class="btn btn-sm btn-outline-secondary" href="/albums/{{ $photo->album->id }}/{{ $photo->id }}/editPhoto">Edit</a>
@endif
