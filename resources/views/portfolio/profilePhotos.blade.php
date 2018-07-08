<div class="mt-3">
  <div class="card-columns">
    @foreach($photos as $photo)
    <div class="card">
        <a href="/storage/{{$photo->album_id}}/photos/{{$photo->photo}}" alt="{{ $photo->title }}"  data-lightbox="Gallery" title="<h4>Title: {{$photo->title}}</h4>
          <p>Caption: {{ $photo->description }}</p><p>Uploaded by: <a href= {{ url($photo->user->name) }}>{{ $photo->user->name }}</a></p><p><a class=text-primary href=/albums/{{ $photo->album->id }}/{{ $photo->id }}>Edit this Photo</a></p> <small>updated: {{ $photo->updated_at->diffForHumans() }}</small>">
      <img class="card-img-top" src="/storage/{{$photo->album_id}}/photos/{{$photo->photo}}" alt="{{ $photo->title }}"> </a>
      <div class="card-body">
        <h4 class="card-title">{{ $photo->title }}</h4>
        <p class="card-text">{{ $photo->description }}</p>
        <hr>
        <p>Album: <a href="/albums/{{ $photo->album_id }}/{{ $photo->album->title }}"> {{ $photo->album->title}}</a></p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            @if(Auth::check())
            @include('portfolio.photoEditBtn')
            @endif
          </div>
          <small class="text-muted">{{ $photo->updated_at->diffForHumans() }}</small>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
