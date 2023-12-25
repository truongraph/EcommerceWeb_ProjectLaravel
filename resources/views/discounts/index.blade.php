@extends('layouts.app')

@section('content')
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Mã giảm giá</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            @forelse ($discounts as $discount)
                <div class="col-md-4 mb-4">
                    <div class="card discount-card">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-4 font-weight-bold">Mã Khuyến Mãi</h4>
                            <h5 class="card-title">Mã vé: {{ $discount->code }}</h5>
                            <p class="card-text">Giảm: {{ number_format($discount->discount)}}</p>
                            <p class="card-text">Hết hạn:{{ \Carbon\Carbon::parse($discount->expiration_date)->format('d/m/Y') }}</p>
                            <p class="card-text">Số lượng còn lại: {{ number_format($discount->limit_number - $discount->number_used) }} mã</p>
                            <p class="card-text">Tối thiểu: {{ number_format($discount->payment_limit) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <p class="empty_cat text-center">Không có mã giảm giá nào. Quay lại sau nhé ^^</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
