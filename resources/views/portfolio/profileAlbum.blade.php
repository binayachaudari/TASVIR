<div class="mt-3">
  <div class="card-columns">
    @foreach($albums as $album)
    <div class="card">
      <a href="/storage/album_covers/{{ $album->cover_img }}" alt="{{ $album->title }}"  data-lightbox="Album" title="<h4>Title: {{$album->title}}</h4>
        <p>Caption: {{ $album->description }}</p><p>Uploaded by: <a href= {{ url($album->user->name) }}>{{ $album->user->name }}</a></p><p><a class=text-primary href=/{{$album->id}}/editAlbum>Edit this Photo</a></p> <small>updated: {{ $album->updated_at->diffForHumans() }}</small>">
      <img class="card-img-top" src="/storage/album_covers/{{ $album->cover_img }}" alt="{{ $album->title }}"></a>
      <div class="card-body">
        <a class="text-primary" href="{{ url('/albums/'.$album->id.'/'.$album->title) }}">
        <h4 class="card-title">{{ $album->title }}</h4></a>
        <p class="card-text">{{ $album->description }}</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <a class="btn btn-sm btn-outline-secondary" href="{{ url('/albums/'.$album->id.'/'.$album->title) }}">View</a>
            @if(Auth::check())
            @include('portfolio.albumEditBtn')
            @endif
          </div>
          <small class="text-muted">{{ $album->created_at->diffForHumans() }}</small>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
