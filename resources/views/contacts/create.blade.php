@extends('layouts.app')


@section('content')
    @include('layouts/page_header', 
        ['title' => 'Create New Contact', 
        'link' => route('contacts.index'), 
        'link_title' => 'Back',
        'icon' => 'fas fa-long-arrow-alt-left'])

    @include('layouts/error')
    @include('layouts/success')


    <form action="{{ route('contacts.store') }}" method="POST">
    	@csrf
         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name" required>
		        </div>
		    </div>
		    <div class="col-12 col-sm-6 col-md-6">
		        <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
		        </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6">
		        <div class="form-group">
                    <strong>Phone:</strong>
                    <div class="field_wrapper">
                        <div class="input-group input-group mb-3">
                            <select class="custom-select mr-3 border-radius" id="inputGroupSelect01" name="phone[1][type]" required>
                                <option value="1">Phone</option>
                                <option value="2">WhatsApp</option>
                            </select>

                            <input type="text" class="form-control no-border-radius-right" name="phone[1][phone]" placeholder="Phone number" required>
                            <div class="input-group-prepend">
                                <span class="input-group-text add_button button-group">[+]</span>
                            </div>
                        </div>
                    </div>
		        </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center btn-save">
                <button type="submit" class="btn btn-success btn-sm float-right">Save and continue</button>
            </div>

		</div>


    </form>

    @include('layouts/copying')
@endsection