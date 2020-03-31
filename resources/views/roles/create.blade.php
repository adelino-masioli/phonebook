@extends('layouts.app')


@section('content')

@include('layouts/page_header', 
        ['title' => 'Create New Role', 
        'link' => route('roles.index'), 
        'link_title' => 'Back',
        'icon' => 'fas fa-long-arrow-alt-left'])

@include('layouts/error')
@include('layouts/success')

{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <div class="custom-control custom-checkbox">
                    {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'custom-control-input', 'id'=>'permission'.$value->id)) }}
                    <label class="custom-control-label" for="permission{{$value->id}}">{{ $value->name }}</label>
                </div>
            
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center btn-save">
        <button type="submit" class="btn btn-success btn-sm float-right">Save and continue</button>
    </div>
</div>
{!! Form::close() !!}

@include('layouts/copying')
@endsection