@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2 class="title">All Logs</h2>
            </div>
        </div>
    </div>


    <table class="table table-bordered">
        <tr class="row m-0">
            <th class="text-center text-uppercase d-inline-block col-1">ID</th>
            <th class="text-center text-uppercase d-inline-block col-3">User name</th>
            <th class="text-center text-uppercase d-inline-block col-2">Action</th>
            <th class="text-center text-uppercase d-inline-block col-4">Description</th>
            <th class="text-center text-uppercase d-inline-block col-2">Created At</th>
        </tr>
	    @foreach ($logs as $log)
	    <tr class="row m-0">
	        <td class="d-inline-block col-1">{{ $log->id }}</td>
	        <td class="d-inline-block col-3">{{ $log->user->name }}</td>
	        <td class="d-inline-block col-2">{{ $log->action }}</td>
	        <td class="d-inline-block col-4">{!! $log->description !!}</td>
	        <td class="d-inline-block col-2">{{ $log->created_at->format('d/m/Y H:i:s') }}</td>
	    </tr>
	    @endforeach
    </table>


    {!! $logs->links() !!}


<p class="text-center text-primary"><small>{{define_footer()}}</small></p>
@endsection