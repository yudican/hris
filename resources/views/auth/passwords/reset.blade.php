@extends('layouts.auth')

@section('content')
<h3 class="text-center">{{ __('Reset Password') }}</h3>
<div class="login-form">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group form-floating-label">
            <input id="email" name="email" type="text" value="{{ $email ?? old('email') }}" class="form-control input-border-bottom @error('email') is-invalid @enderror" autocomplete="email" autofocus readonly>
            <label for="email" class="placeholder">Email</label>
            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group form-floating-label">
            <input id="password" name="password" type="password" class="form-control input-border-bottom @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
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
        <div class="form-group form-floating-label">
            <input id="password-confirm" name="password" type="password" class="form-control input-border-bottom" name="password_confirmation" required autocomplete="new-password">
            <label for="password-confirm" class="placeholder">{{ __('Confirm Password') }}</label>
            <div class="show-password">
                <i class="icon-eye"></i>
            </div>
        </div>
        <div class="form-action mb-3">
            <button type="submit" class="btn btn-primary w-100 btn-login">
                {{ __('{{ __('Reset Password') }}') }}
            </button>
        </div>
        {{-- <div class="login-account">
            <span class="msg">Don't have an account yet ?</span>
            <a href="#" id="show-signup" class="link">Sign Up</a>
        </div> --}}
    </form>
</div>
@endsection
