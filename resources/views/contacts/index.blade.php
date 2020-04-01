@extends('layouts.app')


@section('content')
    @include('layouts/page_header', 
            ['title' => 'Contacts', 
            'link' => route('contacts.create'), 
            'link_title' => 'Create New Contact',
            'icon' => 'fas fa-plus'])

    @include('layouts/error')
    @include('layouts/success')

    @include('layouts/search', ['url' => route('contacts.index'),
        'placeholder' => 'Enter with Name or Email or Phone'
        ])



<div class="table-responsive">
    <table class="table table-bordered">
        <tr class="row m-0">
            <th class="text-center text-uppercase d-inline-block col-12 col-md-1">ID</th>
            <th class="text-center text-uppercase d-inline-block col-12 col-md-3">Name</th>
            <th class="text-center text-uppercase d-inline-block col-12 col-md-3">Email</th>
            <th class="text-center text-uppercase d-inline-block col-12 col-md-3">Phone</th>
            <th class="text-center text-uppercase d-inline-block col-12 col-md-2 actions">Actions</th>
        </tr>
        @if($contacts->count() > 0)
	    @foreach ($contacts as $contact)
	    <tr class="row m-0">
	        <td class="text-center d-inline-block col-12 col-md-1 align-baseline">{{ $contact->id }}</td>
	        <td class="d-inline-block col-12 col-md-3">{{ $contact->name }}</td>
	        <td class="d-inline-block col-12 col-md-3">{{ $contact->email }}</td>
	        <td class="d-inline-block col-12 col-md-3">
                <a href="{{href_phone($contact->get_first_phone($contact->id)['type'], $contact->get_first_phone($contact->id)['phone'])}}" target="_blank">
                    {!!icon_phone($contact->get_first_phone($contact->id)['type'])!!} {{ $contact->get_first_phone($contact->id)['phone'] }}
                </a>
	        </td>
	        <td class="d-inline-block col-12 col-md-2 actions">
            <form action="{{ route('contacts.destroy',$contact->id) }}" method="POST" id="form-delete{{$contact->id}}">
                    <a class="text-secondary" href="{{ route('contacts.show',$contact->id) }}"><i class="far fa-eye"></i></a>
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
        @else
            <tr>
                <td class="text-center d-inline-block col-12">
                    No results found to: <strong>{{$search}}</strong>
                </td>
            </tr>
        @endif
    </table>
</div>


    {!! $contacts->links() !!}


    @include('layouts/copying')
@endsection