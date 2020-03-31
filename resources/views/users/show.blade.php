@extends('layouts.app')


@section('content')

@include('layouts/page_header', 
        ['title' => 'Show User: <strong>'.$user->name.'</strong>', 
        'link' => route('users.index'), 
        'link_title' => 'Back',
        'icon' => 'fas fa-long-arrow-alt-left'])


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <p>{{ $user->name }}</p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            <p>{{ $user->email }}</p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            <p>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </p>
        </div>
    </div>
</div>


@include('layouts/copying')
@endsection