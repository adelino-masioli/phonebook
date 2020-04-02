@extends('layouts.app')


@section('content')
    @include('layouts/page_header', 
        ['title' => 'Show Contact: <strong>'.$contact->name.'</strong>', 
        'link' => route('contacts.index'), 
        'link_title' => 'Back',
        'icon' => 'fas fa-long-arrow-alt-left'])

    @include('layouts/error')
    @include('layouts/success')


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <p>{{ $contact->name }}</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <p>{{ $contact->email }}</p>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone(s):</strong>
                <p>
                @foreach ($contact->get_all_phones($contact->id, true) as $phone)
                    {!!href_phone($phone->type, $phone->phone)!!}
                    {{ $phone->phone }}<br/>
                @endforeach
                </p>
            </div>
        </div>
    </div>

    @include('layouts/copying')
@endsection