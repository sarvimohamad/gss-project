
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سامانه پشتیبانی پایانه های بانکی </title>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-4.6.0/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom-style.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="/images/logo.png">
</head>
<body style="background: url('/images/Rectangle 509.jpg') center/cover no-repeat;height:100vh">
<div id="login-page" style="direction: rtl">

 <div class="d-flex justify-content-center ">
     @if ($errors->any())
         <div class="alert alert-danger error-login">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li style="list-style:none;">{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif
 </div>



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
                    <input class="form-control text-right focus-me" id="email-input" type="email" name="email"
                           placeholder="نام کاربری را وارد کنید" autocomplete="off"  required>
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
                           placeholder="رمز عبور را وارد کنید" autocomplete="new-password"  required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                </div>

                                <div class="form-group">
                                    <div class="col-xs-12 text-right">
                                        <input class="form-control text-right captcha-input" id="captcha-input" type="text" id="captcha"
                                               name="captcha" minlength="4" maxlength="4" placeholder="کد امنیتی را وارد کنید" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="col-12 align-self-start col-6 p-3">
                                    <div class="row">
                                        <div class=" col-6 captcha pb-5">
                                            {!! captcha_img('flat') !!}
                                        </div>

                                        <div class="col-6 pr-5 pt-3 reload ">
                                            <a href="javascript:void(0)" class="reload-img" id="refresh-captcha"
                                               rel="{{url('captcha/flat')}}?">
                                                <img class="reload-captcha" style="width: 30%"
                                                     src="/images/icons8-refresh.svg">
                                            </a>
                                        </div>
                                    </div>

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
<script src="{{asset('js/app.js')}}"></script>
<script>
    function hideIcon(self) {
        self.style.backgroundImage = 'none';
    }
</script>
</body>

</html>
