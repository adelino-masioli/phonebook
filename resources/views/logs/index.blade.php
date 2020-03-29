@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>All Logs</h2>
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
            <th>User name</th>
            <th>Action</th>
            <th>Description</th>
            <th>Created At</th>
        </tr>
	    @foreach ($logs as $log)
	    <tr>
	        <td>{{ $log->id }}</td>
	        <td>{{ $log->user->name }}</td>
	        <td>{{ $log->action }}</td>
	        <td>{!! $log->description !!}</td>
	        <td>{{ $log->created_at->format('d/m/Y H:i:s') }}</td>
	    </tr>
	    @endforeach
    </table>


    {!! $logs->links() !!}


<p class="text-center text-primary"><small>{{define_footer()}}</small></p>
@endsection