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
                                <h4> Đổi mật khẩu </h4>
                                <p class="secon-title-login">Bạn vui lòng nhập mật khẩu mới cho tài khoản của mình</p>
                                <div class="login-register-form">
                                    <form method="post" action="{{ route('reset.password') }}">
                                        @csrf
                                        <div class="login-input-box">
                                            <div class="col_full">
                                                <input type="hidden" name="token" value="{{ $token }}">
                                                <label for="password">Mật khẩu mới: <span class="require_symbol">* </span></label>
                                                <input type="password" name="password" required class="form-control">

                                            </div>
                                            <div class="col_full">
                                                <label for="password_confirmation">Nhập lại mật khẩu mới: <span class="require_symbol">* </span></label>
                                                <input type="password" name="password_confirmation" required class="form-control">

                                            </div>
                                        </div>
                                        <div class="button-box">
                                            <div class="button-box">
                                                <button class="button login-btn" type="submit" value="login"><span>Cập nhật lại mật khẩu</span></button>
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

