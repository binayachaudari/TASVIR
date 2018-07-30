@extends('layouts.app')

@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col-md-9">
      <h4 class="display-4">Upload Photo</h4>
      <hr>
    </div>
  </div>
@include('layouts.messages')
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <form method="POST" action="{{ url(Auth::user()->username.'/'.$album_id.'/uploadPhoto') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="albumTitle">Photo Title</label>
          <input type="text" class="form-control" id="albumTitle" placeholder="Title of the Photo" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
          <label for="Caption">Photo Caption</label>
          <textarea class="form-control" id="description" placeholder="Caption of the Photo" name="caption" value="{{ old('caption') }}" rows="2"></textarea>
        </div>
        <input type="hidden" name="album_id" value="{{ $album_id }}">
        <div class="form-group">
          <label>Choose Photo: </label>
          <input class="btn btn-outline-primary btn-sm" type="file" name="photo" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Add Photo</button>
      </form>
    </div>
  </div>
</div>
</div>
@endsection
