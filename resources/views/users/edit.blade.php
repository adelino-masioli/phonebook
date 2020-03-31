@extends('layouts.app')


@section('content')

@include('layouts/page_header', 
        ['title' => 'Edit User: <strong>'.$user->name.'</strong>', 
        'link' => route('users.index'), 
        'link_title' => 'Back',
        'icon' => 'fas fa-long-arrow-alt-left'])

@include('layouts/error')


{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row">
    
    @include('users/form')

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center btn-save">
        <button type="submit" class="btn btn-success btn-sm float-right">Save and continue</button>
    </div>
</div>
{!! Form::close() !!}


@include('layouts/copying')
@endsection