@extends('layouts.app')


@section('content')

@include('layouts/page_header', 
        ['title' => 'Users Management', 
        'link' => route('users.create'), 
        'link_title' => 'Create New User',
        'icon' => 'fas fa-plus'])

@include('layouts/error')
@include('layouts/success')

@include('layouts/search', ['url' => route('users.index'),
  'placeholder' => 'Enter with Name or Email'
])


<div class="table-responsive">
<table class="table table-bordered">
 <tr class="row m-0">
   <th class="text-center text-uppercase d-inline-block col-12 col-md-1">ID</th>
   <th class="text-center text-uppercase d-inline-block col-12 col-md-3">Name</th>
   <th class="text-center text-uppercase d-inline-block col-12 col-md-4">Email</th>
   <th class="text-center text-uppercase d-inline-block col-12 col-md-2">Roles</th>
   <th class="text-center text-uppercase d-inline-block col-12 col-md-2 actions">Action</th>
 </tr>
  @if ($users->count() > 0)
    @foreach ($users as $key => $user)
    <tr class="row m-0">
      <td class="text-center d-inline-block col-12 col-md-1">{{ $user->id }}</td>
      <td class="d-inline-block col-12 col-md-3">{{ $user->name }}</td>
      <td class="d-inline-block col-12 col-md-4">{{ $user->email }}</td>
      <td class="d-inline-block col-12 col-md-2">
        @if(!empty($user->getRoleNames()))
          @foreach($user->getRoleNames() as $v)
            <label class="badge badge-success mb-0">{{ $v }}</label>
          @endforeach
        @endif
      </td>
      <td class="d-inline-block col-12 col-md-2 actions">
        <a class="text-secondary" href="{{ route('users.show',$user->id) }}"><i class="far fa-eye"></i></a>
        <a class="text-secondary" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-pen"></i></a>
          {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'id'=>'form-delete'.$user->id]) !!}
          <a class="text-danger" href="javascript:void(0)" onclick="$('#form-delete{{$user->id}}').submit();">
            <i class="fas fa-trash"></i>
          </a>
          {!! Form::close() !!}
      </td>
    </tr>
    @endforeach
  @else
    <tr>
      <td class="text-center d-inline-block col-12">
          No results found to: <strong>{{$search}}</strong>
      </td>
    </tr>  
  @endif
</table>
</div>

{!! $users->render() !!}


@include('layouts/copying')

@endsection