@extends('layouts.app')
@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col-md-9">
      <h4 class="display-4">Create Album</h4>
      <hr>
    </div>
  </div>
  @include('layouts.messages')
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <form method="POST" action="{{ url(Auth::user()->username.'/createAlbum') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="albumTitle">Album Title</label>
          <input type="text" class="form-control" id="albumTitel" placeholder="Title of the Album" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
          <label for="Description">Description/Caption</label>
          <textarea class="form-control" id="description" placeholder="Description about the album" name="description" value="{{ old('description') }}" rows="2"></textarea>
        </div>
        <div class="form-group">
          <label>Choose Your Album Cover: </label>
          <input class="btn btn-outline-primary btn-sm" type="file" name="cover_img">
        </div>
        <button type="submit" class="btn btn-primary">Add Album</button>
      </form>
    </div>
  </div>
</div>
</div>
@endsection
