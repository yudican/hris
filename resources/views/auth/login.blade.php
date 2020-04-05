@extends('layouts.auth')

@section('content')
<h3 class="text-center">Login Administrator</h3>
<div class="login-form">
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <div class="form-group form-floating-label">
            <input id="email" name="email" type="text" class="form-control input-border-bottom @error('email') is-invalid @enderror" autocomplete="email" autofocus>
            <label for="email" class="placeholder">Email</label>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group form-floating-label">
            <input id="password" name="password" type="password" class="form-control input-border-bottom @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            <label for="password" class="placeholder">Password</label>
            <div class="show-password">
                <i class="icon-eye"></i>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row form-sub m-0">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="rememberme" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="rememberme">{{ __('Remember Me') }}</label>
            </div>
            
            @if (Route::has('password.request'))
                <a class="link float-right" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
        <div class="form-action mb-3">
            <button type="submit" class="btn btn-primary w-100 btn-login">
                {{ __('Login') }}
            </button>
        </div>
        {{-- <div class="login-account">
            <span class="msg">Don't have an account yet ?</span>
            <a href="#" id="show-signup" class="link">Sign Up</a>
        </div> --}}
    </form>
</div>
@endsection
