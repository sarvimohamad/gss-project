{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('mobile') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile" required autocomplete="current-mobile">--}}

{{--                                @error('mobile')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-3">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}



<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سامانه پشتیبانی پایانه های بانکی </title>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-4.6.0/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom-style.css')}}">
    <link rel="shortcut icon" href="/images/logo.png">
</head>
<body style="background: url('/images/Rectangle 509.jpg') center/cover no-repeat;height:100vh">
<div id="login-page" style="direction: rtl">
    <div class="card mx-auto py-4 px-5 text-center">
        <img src="/images/melalbank-logo-1 1.png" alt="logo" class="melal-logo mx-auto mb-3">
        <h4>خوش آمدید</h4>
        <h6 class="mb-4">سامانه پشتیبانی پایانه های بانکی</h6>
        {{--        @if(Session::has("error"))--}}
        {{--            <div class="alert alert-danger text-center font-weight-bold" style="font-size: 14px">--}}

        {{--            </div>--}}
        {{--        @endif--}}
                            <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control text-right" id="email-input" type="email" name="email"
                           placeholder="نام کاربری را وارد کنید" autocomplete="off" oninvalid="InvalidMsg(this);"
                           onkeypress="hideIcon(this);" oninput="InvalidMsg(this);" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control text-right" id="password-input" type="password" name="password"
                           placeholder="رمز عبور را وارد کنید" autocomplete="new-password" oninvalid="InvalidMsg(this);"
                           onkeypress="hideIcon(this);" oninput="InvalidMsg(this);" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                </div>

{{--                    <div class="form-group">--}}
{{--                        <div class="col-xs-12">--}}
{{--                            <input class="form-control text-right" id="mobile-input" type="mobile" name="mobile"--}}
{{--                                   placeholder="موبایل  را وارد کنید" oninvalid="InvalidMsg(this);"--}}
{{--                                   onkeypress="hideIcon(this);" oninput="InvalidMsg(this);" required>--}}
{{--                            @error('mobile')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

                                <div class="form-group">
                                    <div class="col-xs-12 text-right">
                                        <input class="form-control text-right captcha-input" id="captcha-input" type="text" id="captcha"
                                               name="captcha" minlength="4" maxlength="4" placeholder="کد امنیتی را وارد کنید" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="col-6 align-self-start col-6 ">
                                    <div class="captcha">
                                        {!! captcha_img('flat') !!}
                                    </div>

                                    <a href="javascript:void(0)" id="refresh-captcha" rel="{{url('captcha/flat')}}?">
                                        <img class="reload-captcha" src="/images/menu-icons/rotate-cw.svg">
                                    </a>

                                </div>

                    <div class="form-group text-center m-t-30">
                        <div class="col-xs-12">
                            <button class="btn btn-custom btn-lg btn-bordred btn-block waves-effect waves-light"
                                    type="submit">
                                ورود به پنل مدیریت
                            </button>
                        </div>
                    </div>
        </form>

    </div>
</div>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-4.6.0/js/bootstrap.min.js')}}"></script>
<script>
    function hideIcon(self) {
        self.style.backgroundImage = 'none';
    }
</script>
</body>

</html>
