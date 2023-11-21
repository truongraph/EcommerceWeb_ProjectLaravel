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
                                <h4> Đăng nhập tài khoản </h4>
                                <p class="secon-title-login">Nếu bạn đã có tài khoản. Hãy đăng nhập ngay</p>

                                <div class="login-register-form">
                                    <form id="login-form" method="post" action="{{ route('login.submit') }}">
                                        @csrf
                                        <div class="login-input-box">
                                            <div class="col_full">
                                                <label for="email">Email hoặc tên tài khoản<span class="require_symbol">* </span></label>
                                                <input type="text" name="email" required  class="form-control">
                                            </div>
                                            <div class="col_full">
                                                <label for="password">Mật khẩu:<span class="require_symbol">* </span></label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <a href="{{ route('forgot.password.form') }}">Quên mật khẩu</a>
                                            </div>
                                            <div class="button-box">
                                                <button class="button login-btn" button type="submit"><span>Đăng nhập</span></button>
                                                <a class="button  reg-btn" href="{{ route('register') }}"> Đăng ký tài khoản</a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#login-form').submit(function(event) {
            event.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: '{{ route('login.submit') }}',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                        window.location.href = "{{ route('myaccount') }}"; // Chuyển hướng khi đăng nhập thành công
                    } else {
                        toastr.error(response.message);
                    }
                },
                error: function() {
                    toastr.error('Error logging in');
                }
            });
        });
    });
</script>
@endsection
