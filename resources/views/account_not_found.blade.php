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
                                <div class="login-register-form">
                                    <h3 class="text-center">Thông tin không tồn tại</h3>
                                    <p class="text-center">Tài khoản liên kết với email hoặc số điện thoại này không tồn tại.<br/> Vui lòng kiểm tra chính xác thông tin của bạn và thử tra cứu lại.</p>
                                        <div class="button-box">
                                            <div class="button-box">
                                                <a href="javascript:history.go(-1);" class="button login-btn"><span>Thử tra cứu lại</span></a>
                                            </div>
                                        </div>
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
