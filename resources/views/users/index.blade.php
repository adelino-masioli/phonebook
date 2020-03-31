@extends('layouts.app')


@section('content')

@include('layouts/page_header', 
        ['title' => 'Users Management', 
        'link' => route('users.create'), 
        'link_title' => 'Create New User',
        'icon' => 'fas fa-plus'])

@include('layouts/error')
@include('layouts/success')

<table class="table table-bordered">
 <tr class="row m-0">
   <th class="text-center text-uppercase d-inline-block col-1">ID</th>
   <th class="text-center text-uppercase d-inline-block col-3">Name</th>
   <th class="text-center text-uppercase d-inline-block col-3">Email</th>
   <th class="text-center text-uppercase d-inline-block col-3">Roles</th>
   <th class="text-center text-uppercase d-inline-block col-2 actions">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr class="row m-0">
    <td class="text-center d-inline-block col-1">{{ $user->id }}</td>
    <td class="d-inline-block col-3">{{ $user->name }}</td>
    <td class="d-inline-block col-3">{{ $user->email }}</td>
    <td class="d-inline-block col-3">
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success mb-0">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td class="d-inline-block col-2 actions">
       <a class="text-secondary" href="{{ route('users.show',$user->id) }}"><i class="fas fa-search"></i></a>
       <a class="text-secondary" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-pen"></i></a>
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'id'=>'form-delete'.$user->id]) !!}
        <a class="text-danger" href="javascript:void(0)" onclick="$('#form-delete{{$user->id}}').submit();">
          <i class="fas fa-trash"></i>
        </a>
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $data->render() !!}


@include('layouts/copying')

@endsection