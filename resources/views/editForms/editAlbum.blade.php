@extends('layouts.app')
@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col-md-9">
      <h4 class="display-4">Edit Album: {{ $album->title }}</h4>
      <p class="text-faded">Album Description: {{ $album->description }}</p>
      <hr>
    </div>
  </div>
  @include('layouts.messages')
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <form method="POST" action="{{ url($album->id.'/editAlbum') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="albumTitle">Edit Album Title</label>
          <input type="text" class="form-control" id="albumTitle" placeholder="Edit Title of the Album" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
          <label for="Description">Edit Description/Caption</label>
          <textarea class="form-control" id="description" placeholder="Edit Description about the album" name="description" value="{{ old('description') }}" rows="2"></textarea>
        </div>
        <div class="form-group">
          <label>Edit Your Album Cover: </label>
          <input class="btn btn-outline-primary btn-sm" type="file" name="cover_img" accept"image/*">
        </div>
        <button type="submit" class="btn btn-primary"><i class="far fa-lg fa-edit"></i>
        Edit Album</button>
        <!-- calls Model-->
        <buttons class="btn btn-danger mx-5" data-toggle="modal" data-url="{{ url($album->id.'/deleteAlbum') }}"  data-target="#delete">
        <i class="fas fa-lg fa-trash-alt"></i>
        Delete Album</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Delete Model -->
<form action="{{ url($album->id.'/deleteAlbum') }}" method="POST" class="remove-record">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteLabel">Delete Album</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          You Want You Sure Delete This Album?
          <br>
          <p class="text-danger"><strong>Attention!!! </strong>Deleting This Album will Delete all the Photos inside it!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary remove-data-from-delete-form" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
