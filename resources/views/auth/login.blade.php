@extends('layouts.login')
@section('title','Login')
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="exampleInputEmail" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="exampleInputPassword" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('Login') }}btn btn-primary
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{--<form method="POST" action="{{ route('login') }}">--}}
{{--    @csrf--}}

{{--    <div class="row mb-3">--}}
{{--        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--        <div class="col-md-6">--}}
{{--            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--            @error('email')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row mb-3">--}}
{{--        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--        <div class="col-md-6">--}}
{{--            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--            @error('password')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row mb-3">--}}
{{--        <div class="col-md-6 offset-md-4">--}}
{{--            <div class="form-check">--}}
{{--                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                <label class="form-check-label" for="remember">--}}
{{--                    {{ __('Remember Me') }}--}}
{{--                </label>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="row mb-0">--}}
{{--        <div class="col-md-8 offset-md-4">--}}
{{--            <button type="submit" class="btn btn-primary">--}}
{{--                {{ __('Login') }}--}}
{{--            </button>--}}

{{--            @if (Route::has('password.request'))--}}
{{--                <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot Your Password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</form>--}}
