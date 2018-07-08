@extends('layouts.app')

@section('content')

@include('layouts.messages')
<div class="mx-3 my-4">
  <div class="card-columns">
    @if(count($photos)>0)
    @foreach($photos as $photo)
    <div class="card" >
      <a href="/storage/{{$photo->album_id}}/photos/{{$photo->photo}}" alt="{{ $photo->title }}"  data-lightbox="Gallery" title="<h4>Title: {{$photo->title}}</h4>
        <p>Caption: {{ $photo->description }}</p><p>Uploaded by: <a href= {{ url($photo->user->name) }}>{{ $photo->user->name }}</a></p><p><a class=text-primary href=/albums/{{ $photo->album->id }}/{{ $photo->id }}>Edit this Photo</a></p> <small>updated: {{ $photo->updated_at->diffForHumans() }}</small>">
      <img class="card-img-top" src="/storage/{{$photo->album_id}}/photos/{{$photo->photo}}" alt="{{ $photo->title }}"></a>
      <div class="card-body">
        <h4 class="card-title">{{ $photo->title }}</h4>
        <p class="card-text">{{ $photo->description }}</p>
        <hr>
        <p>Uploaded by: <a href="{{ url($photo->user->username) }}"> {{ $photo->user->name}}</a></p>
        <p>Album: <a href="{{ url('/albums/'.$photo->album->id.'/'.$photo->album->title) }}"> {{ $photo->album->title}}</a></p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <a class="btn btn-sm btn-outline-secondary" href="#">View</a>
          </div>
          <small class="text-muted">{{ $photo->updated_at->diffForHumans() }}</small>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  @else
  <br>
  <h3>No Photos To Show</h3>
  @endif
</div>


@endsection
