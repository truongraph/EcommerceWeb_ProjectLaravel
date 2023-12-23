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
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
                                <h4> Quên mật khẩu </h4>
                                <p class="secon-title-login">Hãy nhập email của bạn để khôi phục</p>
                                <div class="login-register-form">
                                    <form method="post" action="{{ route('forgot.password.email') }}">
                                        @csrf
                                        <div class="login-input-box">
                                            <div class="col_full">
                                                <label for="email">Email:<span class="require_symbol">* </span></label>
                                                <input type="text" name="email"  class="form-control">
                                            </div>
                                        </div>
                                        <div class="button-box">
                                            <div class="button-box">
                                                <button class="button login-btn" button type="submit"><span>Gửi Email Khôi Phục</span></button>
                                                <a class="button  reg-btn" href="{{ route('login') }}"> Quay lại đăng nhập</a>
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
