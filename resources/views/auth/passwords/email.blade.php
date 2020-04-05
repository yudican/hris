@extends('layouts.auth')

@section('content')
<h3 class="text-center">{{ __('Forgot Password') }}</h3>
<div class="login-form">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
    @csrf
        <div class="form-group form-floating-label">
            <input id="email" name="email" type="text" class="form-control input-border-bottom @error('email') is-invalid @enderror" autocomplete="email" autofocus>
            <label for="email" class="placeholder">{{ __('E-Mail Address') }}</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-action mb-3">
            <button type="submit" class="btn btn-primary w-100 btn-login">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
        <div class="login-account">
            <span class="msg">Have password ?</span>
            <a href="{{ route('login') }}" id="show-signup" class="link">Login</a>
        </div>
    </form>
</div>
@endsection
