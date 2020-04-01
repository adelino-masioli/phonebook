@extends('layouts.login')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
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
    
        <div class="col-md-5 col-right">
            <h1> {{ __('Reset Password') }}</h1>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-wrapper">
                                    <i class="fa fa-envelope form-wrapper_icon"></i>
                                    <input   placeholder="{{ __('Email') }}"  id="email" type="email" class="form-wrapper_input" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">
                                </div>
        
                               
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-reset-password">
                                    {{ __('Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
