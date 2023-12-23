@extends('layouts.app')

@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Liên hệ chúng tôi</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->
    <!-- main-content-wrap start -->
    <div class="main-content-wrap shop-page section-ptb">
        <div class="container">
            <div class="blog-wrapper">
                <div class="row justify-content-center">
                    <div class="col-lg-12" style="border-bottom: 1px solid #ddd;margin-bottom:25px;">
                        <h4 class="title-blog">Liên hệ chúng tôi</h4>
                    </div>
                    <div class="col-lg-6 ">
                        <!-- Hiển thị thông báo lỗi -->
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="errorlist">
                        </div>
                        <form accept-charset="UTF-8" action="{{ route('contact.send') }}" method="post">
                            @csrf
                            <div class="form-comment ">
                                <div class="row">
                                    <div class="col-md-6 col-12" style="margin-bottom: 15px;">
                                        <div class="form-group">
                                            <label for="name">
                                                <p> Họ tên <span class="required">*</span></p>
                                            </label>
                                            <input id="name" name="fullname" type="text" value=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12" style="margin-bottom: 15px;">
                                        <div class="form-group">
                                            <label for="email">
                                                <p> Email <span class="required">*</span></p>
                                            </label>
                                            <input id="email" name="email" class="form-control" type="email"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12" style="margin-bottom: 15px;">
                                        <div class="form-group">
                                            <label for="phone">
                                                <p> Số điện thoại <span class="required">*</span></p>
                                            </label>
                                            <input type="number" id="phone" class="form-control" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12" style="margin-bottom: 15px;">
                                        <div class="form-group">
                                            <label for="message">
                                                <p> Tiêu đề thư<span class="required">*</span></p>
                                            </label>
                                            <input id="message" name="title" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 15px;">
                                    <label for="message">
                                        <p> Nội dung <span class="required">*</span></p>
                                    </label>
                                    <textarea id="message" name="content" class="form-control custom-control" rows="5"></textarea>
                                </div>
                                <div style="margin-bottom: 15px; text-align: center;">
                                    <button type="submit" class="continue-btn">Gửi liên hệ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection
