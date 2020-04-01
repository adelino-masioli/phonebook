@extends('layouts.login')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5 col-right">

            <div class="brand"><img src="{{asset('images/brand.png')}}" alt="{{ config('app.name', 'Phone Book') }}"></div>
            
            <h1> {{ __('Create Account') }}</h1>


                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-wrapper">
                                    <i class="fa fa-user form-wrapper_icon"></i>
                                    <input   placeholder="{{ __('Name') }}"  type="text" class="form-wrapper_input" name="name" value="{{ old('name') }}" required autofocus autocomplete="off">
                                </div>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-wrapper">
                                    <i class="fa fa-envelope form-wrapper_icon"></i>
                                    <input   placeholder="{{ __('E-Mail Address') }}"  type="email" class="form-wrapper_input" name="email" value="{{ old('email') }}" required  autocomplete="off">
                                </div>
        
                               
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-wrapper">
                                    <i class="fa fa-lock form-wrapper_icon"></i>
                                    <input  placeholder="{{ __('Password') }}" type="password" class="form-wrapper_input" name="password" required autocomplete="off">
                                </div>
        
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-wrapper">
                                    <i class="fa fa-lock form-wrapper_icon"></i>
                                    <input  placeholder="{{ __('Confirm Password') }}"  type="password" class="form-wrapper_input" name="password_confirmation" required autocomplete="off">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-sign-up">
                                    {{ __('Sign up') }}
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
   

        <div class="col-md-7 col-left">
            <h1> {{ __('Hi, Welcome back!') }}</h1>
            
            <div class="description">
                <p>To keep connected please</p>
                <p>login with your personal info</p>
            </div>

            <a class="btn" href="{{ route('login') }}">
                {{ __('Sign in') }}
            </a>
        </div>
    </div>
</div>
@endsection
