@extends('layouts.login')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-7 col-left">
            <h1> {{ __('Hello, how are you?') }}</h1>
            
            <div class="description">
                <p>Enter your personal details</p>
                <p>and start your journey with us</p>
            </div>

            <a class="btn" href="{{ route('register') }}">
                {{ __('Sign up') }}
            </a>
        </div>

        <div class="col-md-5 col-right">

            <h1> {{ __('Sign in to Phone Book') }}</h1>

            <form method="POST" action="{{ route('login') }}" autocomplete="off">
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
                    <div class="col-md-12">
                        <div class="form-wrapper">
                            <i class="fa fa-lock form-wrapper_icon"></i>
                            <input  placeholder="{{ __('Password') }}" id="password" type="password" class="form-wrapper_input" name="password" required autocomplete="off">
                        </div>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="login-bottom">
                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Sign in') }}
                            </button>
                        </div>

                        <div class="col-md-12 text-center btn-forgot-password">
                            @if (Route::has('password.request'))
                                <a class="btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
