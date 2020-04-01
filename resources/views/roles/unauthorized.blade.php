@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb text-center">
            <div>
                <h1 class="title-unauthorized">401</h1>
                <h2 class="subtitle-unauthorized">You are not authorized for selected action</h2>

                <a class="btn btn-secondary mb-3 mt-3" href="{{route('contacts.index')}}">Go to contacts page</a>
            </div>
        </div>
    </div>


<p class="text-center text-primary"><small>{{define_footer()}}</small></p>
@endsection