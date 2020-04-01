@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2 class="title">All Logs</h2>
            </div>
        </div>
    </div>


    @include('layouts/search', ['url' => route('logs.index'),
        'placeholder' => 'Enter with User Name or Action or Description'
        ])


    <div class="table-responsive">
    <table class="table table-bordered">
        <tr class="row m-0">
            <th class="text-center text-uppercase d-inline-block col-12 col-md-1">ID</th>
            <th class="text-center text-uppercase d-inline-block col-12 col-md-3">User name</th>
            <th class="text-center text-uppercase d-inline-block col-12 col-md-2">Action</th>
            <th class="text-center text-uppercase d-inline-block col-12 col-md-4">Description</th>
            <th class="text-center text-uppercase d-inline-block col-12 col-md-2">Created At</th>
        </tr>
	    @if ($logs->count() > 0)
            @foreach ($logs as $log)
            <tr class="row m-0">
                <td class="text-center d-inline-block col-12 col-md-1">{{ $log->id }}</td>
                <td class="d-inline-block col-12 col-md-3">{{ $log->user->name }}</td>
                <td class="d-inline-block text-uppercase  col-12 col-md-2">{{ $log->action }}</td>
                <td class="d-inline-block text-capitalize col-12 col-md-4">{!! $log->description !!}</td>
                <td class="d-inline-block col-12 col-md-2">{{ $log->created_at->format('d/m/Y H:i:s') }}</td>
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


    {!! $logs->links() !!}


<p class="text-center text-primary"><small>{{define_footer()}}</small></p>
@endsection