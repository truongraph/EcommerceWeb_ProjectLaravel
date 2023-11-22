@extends('layouts.app')

@section('content')


<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb lagin-and-register-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 m-auto">
                <div class="login-register-wrapper">
                    <!-- login-register-tab-list start -->
                    <!-- login-register-tab-list end -->
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <h4> Đăng ký tài khoản </h4>
                                <p class="secon-title-login">Hãy đăng ký ngay để nhận được mã giảm ưu đãi</p>
                                <div class="login-register-form">
                                    <form method="post" action="{{ route('register.submit') }}">
                                        @csrf
                                        <div class="login-input-box">
                                            <div class="col_full">
                                                <label for="username">Tên tài khoản<span class="require_symbol"> *</span></label>
                                                <input type="text" id="username" name="username" value="{{ old('username') }}" required class="form-control">
                                            </div>
                                            <div class="col_full">
                                                <label for="password">Mật khẩu <span class="require_symbol">* </span></label>
                                                <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                                            </div>
                                            <div class="col_full">
                                                <label for="repassword">Nhập lại mật khẩu <span class="require_symbol">* </span></label>
                                                <input type="password" name="repassword" value="{{ old('repassword') }}" class="form-control">
                                            </div>
                                            <div class="col_full">
                                                <label for="name">Họ và tên<span class="require_symbol"> *</span></label>
                                                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-control">
                                            </div>
                                            <div class="col_full">
                                                <label for="email">Email<span class="require_symbol"> *</span></label>
                                                <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-control">
                                            </div>
                                            <div class="col_full">
                                                <label for="phone">Số điện thoại<span class="require_symbol"> *</span></label>
                                                <input type="number" id="phone"  name="phone" value="{{ old('phone') }}" required class="form-control">
                                            </div>
                                        </div>
                                        <div class="button-box">
											<div class="button-box">
												<button class="button login-btn" type="submit"><span>Đăng ký tài khoản</span></button>
												<ul style="margin-top: 20px;">
													<li class="right" style="font-size: 13px;padding-left:3px">Bạn đã có tài khoản trên cửa hàng?. <a href="{{ route('login') }}" style="font-size: 13px; color: red;font-weight:600">Đăng nhập tại đây</a></li>
												</ul>
											</div>
										</div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->
@endsection

