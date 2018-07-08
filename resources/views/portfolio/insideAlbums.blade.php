@extends('layouts.app')
@section('content')
<div class="container mt-3">
<div class="row">
  <div class="col-md-12">
    <h4 class="display-4">Album: {{ $album->title }}</h4>
    <p class="text-faded">Album Caption: {{ $album->description }}</p>
    <hr>
  </div>
</div>
@include('layouts.messages')
<div class="mt-3">
  <div class="card-columns">
    @if(count($album->photos)>0)
    @foreach($album->photos as $photo)
    <div class="card">
      <a href="/storage/{{$photo->album_id}}/photos/{{$photo->photo}}" alt="{{ $photo->title }}"  data-lightbox="Gallery" title="<h4>Title: {{$photo->title}}</h4>
        <p>Caption: {{ $photo->description }}</p><p>Uploaded by: <a href= {{ url($photo->user->name) }}>{{ $photo->user->name }}</a></p><p><a class=text-primary href=/albums/{{ $photo->album->id }}/{{ $photo->id }}>Edit this Photo</a></p> <small>updated: {{ $photo->updated_at->diffForHumans() }}</small>">
      <img class="card-img-top" src="/storage/{{$album->id}}/photos/{{$photo->photo}}" alt="{{ $album->title }}"></a>
      <div class="card-body">
        <h4 class="card-title">{{ $photo->title }}</h4>
        <p class="card-text">{{ $photo->description }}</p>
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
  @else
  <br>
  <h3>No Photos!!</h3>
  @endif
</div>
@endsection
