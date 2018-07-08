@extends('layouts.app')
@section('content')
<div class="container mt-3">
<div class="row">
  <div class="col-md-12">
    <h4 class="display-4">Upload Photo to Album</h4>
    <hr>
  </div>
</div>
@include('layouts.messages')
<div class="mt-3">
  <div class="card-columns">
    @if(count($albums)>0)
    @foreach($albums as $album)
    <div class="card">
      <img class="card-img-top" src="/storage/album_covers/{{ $album->cover_img }}" alt="{{ $album->title }}">
      <div class="card-body">
        <a class="text-primary" href="/{{ Auth::user()->username }}/{{ $album->id }}/uploadPhoto">
          <h4 class="card-title">{{ $album->title }}</h4>
        </a>
        <p class="card-text">{{ $album->description }}</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <a class="btn btn-sm btn-outline-primary" href="/{{ Auth::user()->username }}/{{ $album->id }}/uploadPhoto">Select</a>
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
  @else
  <br>
  <h3>Album is empty</h3>
  @endif
</div>
@endsection
