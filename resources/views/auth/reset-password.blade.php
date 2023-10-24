<html>
@php
    $icon = \App\Models\Logo::query()->where('status', true)->first();
@endphp
<head>
    <meta charset="utf-8"/>
    <title>Làm mới mật khẩu</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="ID BOTA - Đăng nhập" name="description"/>
    <meta content="@x-team BOTA" name="author"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="shortcut icon" href="{{ $icon->icon ? asset('storage/'. $icon->icon) : '#' }}" />
    <link rel="icon" href="{{ $icon->icon ? asset('storage/'. $icon->icon) : '#' }}" />
    <link href="{{ asset("statics/css/login.css") }}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{ asset("statics/js/jquery.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("statics/js/jquery.validate.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("statics/js/login.js") }}"></script>
</head>
<body>
<div class="bota_login_style">
    <div class="col-12">
        <div class="container form-login">
            <div class="login-form-view">
                <div class="bota_header">
                    <a href="{{ asset("statics/imgs/logo.png") }}" title="logo">
                        <img class="logo" alt="Bota" src="{{ asset("statics/imgs/logo.png") }}" width="192" height="51">
                    </a>
                </div>
                <x-auth-validation-errors class="mb-4" :errors="$errors" style="color: red;"/>
                <div class="login-form-block">
                    <!-- BEGIN LOGIN FORM -->
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="page-login">
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="form-group">
                                <x-input id="email" class="block w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <x-input id="password" class="block w-full"
                                         type="password"
                                         name="password"
                                         placeholder="Mật khẩu"
                                         required autocomplete="current-password" />
                                <a href="javascript:;" id="show-password" class="input-inline-button">
                                    <img class="icon-eye-slash" src="{{ asset("statics/imgs/eye-slash.svg") }}">
                                    <img class="icon-eye" src="{{ asset("statics/imgs/eye.svg") }}">
                                </a>
                            </div>
                            <div class="form-group">
                                <x-input id="password_confirmation" class="block w-full"
                                         type="password"
                                         name="password_confirmation"
                                         placeholder="Nhập lại mật khẩu"
                                         required autocomplete="current-password" />
                                <a href="javascript:;" id="show-password-confirmation" class="input-inline-button">
                                    <img class="icon-eye-slash" src="{{ asset("statics/imgs/eye-slash.svg") }}">
                                    <img class="icon-eye" src="{{ asset("statics/imgs/eye.svg") }}">
                                </a>
                            </div>
                            <input type="hidden" name="service" value=""/>
                            <input type="hidden" name="cont" value=""/>
                            <input type="hidden" name="w" value=""/>
                            <button type="submit">Lưu</button>
                        </div>
                    </form>
                    <!-- END LOGIN FORM -->
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#show-password').on('click', function() {
                        var passwordField = $('#password');
                        var passwordConfirmationField = $('#password_confirmation');
                        var passwordFieldType = passwordField.attr('type');
                        var passwordConfirmationFieldType = passwordConfirmationField.attr('type');

                        if (passwordFieldType === "password" && passwordConfirmationFieldType === "password") {
                            $('.icon-eye').show()
                            $('.icon-eye-slash').hide()
                            passwordField.attr('type', 'text');
                            passwordConfirmationField.attr('type', 'text');
                        } else {
                            $('.icon-eye-slash').show()
                            $('.icon-eye').hide()
                            passwordField.attr('type', 'password');
                            passwordConfirmationField.attr('type', 'password');
                        }
                    });

                    $('#show-password-confirmation').on('click', function() {
                        var passwordField = $('#password');
                        var passwordConfirmationField = $('#password_confirmation');
                        var passwordFieldType = passwordField.attr('type');
                        var passwordConfirmationFieldType = passwordConfirmationField.attr('type');

                        if (passwordFieldType === "password" && passwordConfirmationFieldType === "password") {
                            $('.icon-eye').show()
                            $('.icon-eye-slash').hide()
                            passwordField.attr('type', 'text');
                            passwordConfirmationField.attr('type', 'text');
                        } else {
                            $('.icon-eye-slash').show()
                            $('.icon-eye').hide()
                            passwordField.attr('type', 'password');
                            passwordConfirmationField.attr('type', 'password');
                        }
                    });
                });
            </script>
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <div class="forgot-pass-view forgot-pass-block">
                <div class="bota_header">
                    <a href="{{ route('index') }}" title="logo">
                        <img class="logo" alt="Bota" src="{{ asset("statics/imgs/logo.png") }}" width="192" height="51">
                    </a>
                    <h2 class="title-center">Quên mật khẩu ?</h2>
                </div>
                <div class="login-form-block">
                    <div class="bnc-lostpassword notactive">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" style="color: red;"/>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="page-login">
                                <p>Hãy nhập email để lấy lại mật khẩu.</p>
                                {{--                                <div class="processing-message alert alert-success" style="display: none;">Đang xử lí...</div>--}}
                                {{--                                <div class="success-message alert alert-success" style="display: none;">Hướng dẫn lấy lại mật khẩu đã được gửi về email của bạn, hãy kiểm tra email và tiếp tục quá trình.</div>--}}
                                <div class="form-group">
                                    <input class="placeholder-no-fix" type="email" autocomplete="on" value="{{old('email')}}" placeholder="Email" name="email" data-error-required="Email không được để trống." data-error-email="Email không đúng định dạng."/>
                                </div>
                                <button type="submit"> Gửi</button>
                                <div class="bota_login_link">
                                    Đã có tài khoản<a href="javascript:void(0);" title="Đăng nhập ngay" id="back-btn"> Đăng nhập ngay</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END FORGOT PASSWORD FORM -->
        </div>
    </div>
    <!-- BEGIN COPYRIGHT -->
    <div class="col-12">
        <div class="bota_footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 col-sm-12 col-12">
                        <div class="copyright">Copyright © 2023 bota.vn - Giải pháp quản lý và bán hàng đa kênh toàn diện</div>
                    </div>
                    <div class="col-xl-6 col-lg-5 col-sm-12 col-12">
                        <ul class="bota_footer_link">
                            <li>
                                <a href="tel:19002008" title="Trung tâm trợ giúp">
                                    Trung tâm trợ giúp
                                </a>
                            </li>
                            <li>
                                <a href="tel:19002008" title="Ý kiến phản hồi">
                                    Ý kiến phản hồi
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>