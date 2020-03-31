@extends('layouts.app')


@section('content')
@include('layouts/page_header', 
        ['title' => 'Show Role: <strong>'.$role->name.'</strong>', 
        'link' => route('roles.index'), 
        'link_title' => 'Back',
        'icon' => 'fas fa-long-arrow-alt-left'])

@include('layouts/error')
@include('layouts/success')


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <p>{{ $role->name }}</p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            <p>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="badge badge-success">{{ $v->name }}</label><br/>
                @endforeach
            @endif
            </p>
        </div>
    </div>
</div>

@include('layouts/copying')
@endsection