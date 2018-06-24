@extends('layouts.page_error')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error">
                <h1 class="display-1 text-muted">
                    Oops!</h1>
                <h2 class="display-3 text-warning"><strong>
                  408 Request Timeout</strong>
                </h2>
                <h6 class="text-muted">
                    Sorry, The server timed out waiting for the request!
                </h6>
                <hr>
                    <a href="/" class="btn btn-outline-primary"><i class="fa fa-home"></i>
                        Take Me Home </a>
            </div>
        </div>
    </div>
</div>
@endsection
