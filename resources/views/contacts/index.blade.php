@extends('layouts.app')


@section('content')
    @include('layouts/page_header', 
            ['title' => 'Contacts', 
            'link' => route('contacts.create'), 
            'link_title' => 'Create New Contact',
            'icon' => 'fas fa-plus'])

    @include('layouts/error')
    @include('layouts/success')

    <div class="card">
        <div class="card-body">
        <form action="{{route('contacts.index')}}" method="GET">
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter with Name, Email or Phone" name="search" aria-label="search" aria-describedby="basic-addon1" value="{{$search}}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <table class="table table-bordered">
        <tr class="row m-0">
            <th class="text-center text-uppercase d-inline-block col-1">ID</th>
            <th class="text-center text-uppercase d-inline-block col-3">Name</th>
            <th class="text-center text-uppercase d-inline-block col-3">Email</th>
            <th class="text-center text-uppercase d-inline-block col-3">Phone</th>
            <th class="text-center text-uppercase d-inline-block col-2 actions">Actions</th>
        </tr>
	    @foreach ($contacts as $contact)
	    <tr class="row m-0">
	        <td class="text-center d-inline-block col-1">{{ $contact->id }}</td>
	        <td class="d-inline-block col-3">{{ $contact->name }}</td>
	        <td class="d-inline-block col-3">{{ $contact->email }}</td>
	        <td class="d-inline-block col-3">
                <a href="{{href_phone($contact->get_first_phone($contact->id)['type'], $contact->get_first_phone($contact->id)['phone'])}}">{{ $contact->get_first_phone($contact->id)['phone'] }}</a>
            </td>
	        <td class="d-inline-block col-2 actions">
            <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST" id="form-delete{{$contact->id}}">
                    <a class="text-secondary" href="{{ route('contacts.show',$contact->id) }}"><i class="fas fa-search"></i></a>
                    @can('contact-edit')
                    <a class="text-secondary" href="{{ route('contacts.edit',$contact->id) }}"><i class="fas fa-pen"></i></a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('contact-delete')
                    <a class="text-danger" href="javascript:void(0)" onclick="$('#form-delete{{$contact->id}}').submit();">
                        <i class="fas fa-trash"></i>
                      </a>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $contacts->links() !!}


    @include('layouts/copying')
@endsection