@if(Auth::user()->id == $users->id)
<li class="nav-item">
  <a class="nav-link active" id="albums-tab" data-toggle="tab" href="#albums" role="tab" aria-controls="albums" aria-selected="true">My Albums</a>
</li>
<li class="nav-item">
  <a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">My Photos</a>
</li>
@else
<li class="nav-item">
  <a class="nav-link active" id="albums-tab" data-toggle="tab" href="#albums" role="tab" aria-controls="albums" aria-selected="true">{{ $users->name }}'s Albums</a>
</li>
<li class="nav-item">
  <a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">{{ $users->name }}'s Photos</a>
</li>
@endif
