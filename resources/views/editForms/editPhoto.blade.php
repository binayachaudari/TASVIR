@extends('layouts.app')
@section('content')
<div class="container mt-3">
  <div class="row">
    <div class="col-md-9">
      <h4 class="display-4">Edit Photo: {{ $photo->title }}</h4>
      <p class="text-faded">Photo Caption: {{ $photo->description }}</p>
      <hr>
    </div>
  </div>
  @include('layouts.messages')
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <form method="POST" action="{{ url('albums/'.$album_id.'/'.$photo->id.'/editPhoto') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="albumTitle">Edit Photo Title</label>
          <input type="text" class="form-control" id="albumTitel" placeholder="Edit Title of the Photo" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
          <label for="Description">Edit Description/Caption</label>
          <textarea class="form-control" id="description" placeholder="Edit Description about the Photo" name="caption" value="{{ old('description') }}" rows="2"></textarea>
        </div>
        <div class="form-group">
          <label>Change Photo: </label>
          <input class="btn btn-outline-primary btn-sm" type="file" name="photo">
        </div>
        <button type="submit" class="btn btn-primary"><i class="far fa-lg fa-edit"></i>
        Edit Photo</button>
        <buttons class="btn btn-danger mx-5" data-toggle="modal" data-url="{{ url('/albums/'.$album_id.'/'.$photo->id.'/deletePhoto') }}"  data-target="#delete">
        <i class="fas fa-lg fa-trash-alt"></i>
        Delete Photo</button>
      </form>
    </div>
  </div>
</div>
</div>
<!-- Delete Model -->
<form action="{{ url('/albums/'.$album_id.'/'.$photo->id.'/deletePhoto') }}" method="POST" class="remove-record">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteLabel">Delete Photo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          You Want You Sure Delete This Photo?
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
