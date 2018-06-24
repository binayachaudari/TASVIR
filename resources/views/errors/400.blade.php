@extends('layouts.page_error')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="error">
            <h1 class="display-1 text-muted">
               Oops!
            </h1>
            <h2 class="display-3 text-danger"><strong>
               400 Bad Request</strong>
            </h2>
            <h6 class="text-muted">
               Sorry, the request had bad syntax or was inherently impossible to be satisfied!
            </h6>
@endsection
