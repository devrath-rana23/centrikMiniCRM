@extends('layouts.app')

@section('content')
    <div class="auth-container">
        <img class="auth-image" src="{{ asset('assets/img/auth-image.png') }}" alt="">
        <div class="auth-content">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" class="login-form">
                            @csrf


                            <input placeholder="example@gmail.com" id="email" type="email"
                                class="form-group @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror


                            <input placeholder="password" id="password" type="password"
                                class="form-group @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div>
                                <input class="form-group form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>


                            <button type="submit" class="form-group  btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <div class="form-group forgot-password-btn">
                                <a class=" btn btn-link " href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>

                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
