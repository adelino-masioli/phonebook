@extends('layouts.app')


@section('content')
    @include('layouts/page_header', 
        ['title' => 'Edit Contact: <strong>'.$contact->name.'</strong>', 
        'link' => route('contacts.index'), 
        'link_title' => 'Back',
        'icon' => 'fas fa-long-arrow-alt-left'])

    @include('layouts/error')
    @include('layouts/success')

    <form action="{{ route('contacts.update',$contact->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" value="{{ $contact->name }}" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-6 col-md-6">
		        <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $contact->email }}">
		        </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
		        <div class="form-group">
                    <strong>Phone:</strong>
                    <div class="field_wrapper">

                        <div class="input-group input-group mb-3">
                            <select class="custom-select mr-3 border-radius" id="inputGroupSelect01" name="phone[1][type]">
                                <option value="1" @if($contact->get_first_phone($contact->id)['type'] == 1) selected @endif >Phone</option>
                                <option value="2" @if($contact->get_first_phone($contact->id)['type'] == 2) selected @endif >WhatsApp</option>
                            </select>

                            <input type="text" class="form-control no-border-radius-right" name="phone[1][phone]" placeholder="Phone number" value="{{ $contact->get_first_phone($contact->id)['phone'] }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text add_button button-group">[+]</span>
                            </div>
                        </div>

                        @foreach ($contact->get_all_phones($contact->id, null) as $phone)
                            <div class="input-group input-group mb-3">
                                <select class="custom-select mr-3 border-radius" id="inputGroupSelect01" name="phone[{{$phone->id}}][type]">
                                    <option value="1" @if($phone->type == 1) selected @endif >Phone</option>
                                    <option value="2" @if($phone->type == 2) selected @endif >WhatsApp</option>
                                </select>

                                <input type="text" class="form-control no-border-radius-right" name="phone[{{$phone->id}}][phone]" placeholder="Phone number" value="{{ $phone->phone }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text remove_button button-group">[X]</span>
                                </div>
                            </div>                            
                        @endforeach

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