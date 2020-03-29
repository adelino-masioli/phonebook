@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Contacts</h2>
            </div>
            <div class="pull-right">
                @can('phonebook-create')
                <a class="btn btn-success" href="{{ route('phonebooks.create') }}"> Create New Contact</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
	    @foreach ($phonebooks as $phonebook)
	    <tr>
	        <td>{{ $phonebook->id }}</td>
	        <td>{{ $phonebook->name }}</td>
	        <td>{{ $phonebook->email }}</td>
	        <td>{{ $phonebook->get_first_phone($phonebook->id) }}</td>
	        <td>
                <form action="{{ route('phonebooks.destroy',$phonebook->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('phonebooks.show',$phonebook->id) }}">Show</a>
                    @can('phonebook-edit')
                    <a class="btn btn-primary" href="{{ route('phonebooks.edit',$phonebook->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('phonebook-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $phonebooks->links() !!}


<p class="text-center text-primary"><small>{{define_footer()}}</small></p>
@endsection