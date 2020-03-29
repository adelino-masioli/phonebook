@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Contact</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('phonebooks.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('phonebooks.update',$phonebook->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" value="{{ $phonebook->name }}" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $phonebook->email }}">
		        </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
                    <strong>Phone:</strong>
                    <div class="field_wrapper">

                        <div class="input-group input-group-sm mb-3">
                            <input type="text" class="form-control" name="phone[]" placeholder="Phone number" value="{{ $phonebook->get_first_phone($phonebook->id) }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text add_button">[+]</span>
                            </div>
                        </div>

                        @foreach ($phonebook->get_all_phones($phonebook->id) as $phone)
                            <div class="input-group input-group-sm mb-3">
                                <input type="text" class="form-control" name="phone[]" placeholder="Phone number" value="{{ $phone->phone }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text remove_button">[X]</span>
                                </div>
                            </div>                            
                        @endforeach

                    </div>
		        </div>
            </div>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

    <p class="text-center text-primary"><small>{{define_footer()}}</small></p>
@endsection