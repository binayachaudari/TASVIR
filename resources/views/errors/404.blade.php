@extends('layouts.page_error')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error">
                <h1 class="display-1 text-muted">
                    Oops!</h1>
                <h2 class="display-3 text-danger"><strong>
                  404 Not Found</strong>
                </h2>
                <h6 class="text-muted">
                    Sorry, an error has occured, Requested page not found!
                </h6>
                <hr>
                    <a href="/" class="btn btn-outline-primary"><i class="fa fa-home"></i>
                        Take Me Home </a>
            </div>
        </div>
    </div>
</div>
@endsection
