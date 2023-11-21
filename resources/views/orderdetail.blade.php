@extends('layouts.app')

@section('content')

<!-- main-content-wrap start -->
<div class="main-content-wrap section-ptb my-account-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="account-dashboard">
                    <div class="dashboard-upper-info">
                        <h4>Chi tiết đơn hàng</h4>
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="table-responsive">
                                @if($orderDetails->isNotEmpty())
                                <table class="table table-responsive table-bordered text-left my-orders-table">
                                    <thead>
                                        <tr class="first last">
                                            <th class="text-center last">Hình ảnh</th>
                                            <th class="text-center last">Tên sản phẩm</th>
                                            <th class="text-center last">Mã sản phẩm</th>
                                            <th class="text-center last">Size</th>
                                            <th class="text-center last">Màu</th>
                                            <th class="text-center last">Giá bán</th>
                                            <th class="text-center last">Số lượng</th>
                                            <th class="text-center last">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderDetails as $detail)
                                        {{-- <li>{{ $detail->product->name_product }} - {{ $detail->quantity }} - {{ $detail->totalprice }}</li>
                                        <p>Size: {{ $detail->sizes->desc_size }}</p>
                                        <p>Color: {{ $detail->colors->desc_color }}</p> --}}
                                        <tr>
                                            <td class="text-center last" width="100px">	 <a href="{{ route('products.show', ['linkProduct' => $detail->product->link_product]) }}">
                                                <img src="{{ asset('img/products/' . $detail->product->id . '/' .$detail->product->image_product) }}"
                                                    alt="">
                                            </a>
                                         </td>
                                             <td class="text-center last"><a href="chitietsanpham.html">{{ $detail->product->name_product }}</a></td>
                                             <td class="text-center last" width="150px">{{ $detail->product->sku }}</td>
                                             <td class="text-center last" width="150px">{{ $detail->sizes->desc_size }}</td>
                                             <td class="text-center last" width="150px">{{ $detail->colors->desc_color }}</td>
                                             <td class="text-center last" width="150px">
                                                @if ($detail->product->sellprice_product > 0)
                                                @php
                                                $formattedPrice = number_format($detail->product->sellprice_product, 0, '.',
                                                ',');
                                                $formattedPriceold = number_format($detail->product->price_product, 0, '.', ',');
                                                @endphp
                                                <p>{{ $formattedPrice }} đ</p>
                                                <del>{{ $formattedPriceold }} đ</del>
                                                @endif
                                                @php
                                                $setemptysell = number_format($detail->product->sellprice_product, 0, '.', ',');
                                                @endphp
                                                @if ($setemptysell === '0')
                                                @php
                                                $formattedPrice = number_format($detail->product->price_product, 0, '.', ',');
                                                @endphp

                                                <p>{{ $formattedPrice }} đ</p>
                                                @endif
                                                </td>
                                             <td class="text-center last" width="100px">{{ $detail->quantity }}</td>
                                             <td class="text-center last" width="150px">
                                                @if ($detail->product->sellprice_product > 0)
                                                @php
                                                $formattedPrice = number_format($detail->quantity * $detail->product->sellprice_product, 0, '.',
                                                ',');
                                                $formattedPriceold = number_format($detail->product->price_product, 0, '.', ',');
                                                @endphp
                                                {{ $formattedPrice }} đ
                                                @endif
                                                @php
                                                $setemptysell = number_format($detail->product->sellprice_product, 0, '.', ',');
                                                @endphp
                                                @if ($setemptysell === '0')
                                                @php
                                                $formattedPrice = number_format($detail->quantity * $detail->product->price_product, 0, '.', ',');
                                                @endphp
                                                {{ $formattedPrice }} đ
                                                @endif
                                            </td>
                                         </tr>
                                    @endforeach
                                            
                                    </tbody>
                                </table>
                            @else
                                <p>Không có chi tiết đơn hàng nào.</p>
                            @endif
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="content-order">
                                <h4>Thông tin giao hàng</h4>
                                <p> <strong>Mã đơn hàng:</strong> <a style="color: #1d6cd9;font-weight: 600;">#{{  $order->code_order  }}</a></p>
                                <p> <strong>Trạng thái đơn hàng:</strong> 
                                    <span class="badge @if($order->status_order == 1) pending @elseif($order->status_order == 0) cancelled @elseif($order->status_order == 2) confirmed @elseif($order->status_order == 3) delivering @elseif($order->status_order == 4) delivered @endif">
                                        @if($order->status_order == 1) Chờ xác nhận @elseif($order->status_order == 0) Đã huỷ @elseif($order->status_order == 2) Đã xác nhận @elseif($order->status_order == 3) Đang giao hàng @elseif($order->status_order == 4) Giao thành công @endif
                                    </span>     
                                </p>
                                <p> <strong>Phương thức thanh toán:</strong> {{ $order->paymentMethod->name_payment }}</p>
                                <p> <strong>Họ tên khách hàng:</strong> {{ $order->name_order }}</p>
                                <p> <strong>Số điện thoại:</strong> {{ $order->phone_order }}</p>
                                <p> <strong>Thời gian đặt hàng:</strong> {{ \Carbon\Carbon::parse($order->date_order)->format('d/m/Y H:i:s') }}</p>
                                <p> <strong>Địa chỉ giao hàng:</strong> {{ $order->address_order }}</p>
                                <p> <strong>Ghi chú đơn hàng:</strong> {{ $order->note }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="content-order">
                                <h4>Thông tin thanh toán</h4>
                                <p> <strong> Tổng tiền đơn hàng: </strong> 
                                    @if($order->discount_code && $order->discount)
                                    <span style="float: right;">{{ number_format($order->total_order + $order->discount->discount) }} đ</span>
                                @else
                                <span style="float: right;">{{ number_format($order->total_order) }} đ</span>
                                @endif
                                   </p>
                              <p>
                           <strong>Mã giảm giá :</strong>
                           @if($order->discount_code && $order->discount)
                                    <span style="float: right;">- {{ number_format($order->discount->discount) }} đ</span>
                                @else
                                    <span style="float: right;">Không có mã giảm giá</span>
                                @endif
                       </p>
                                <p>
                                    <strong> Thành tiền:</strong>
                                   
                                <span style="float: right;"><span style="color: red; font-size: 20px;font-weight:600">{{ number_format($order->total_order) }} đ</span></span>
                                   
                                </p>
                            </div>
                          <a   class="text-white continue-btn text-center" style="display: block;width:100%" href="javascript:history.go(-1);"><i class='bx bx-left-arrow-alt' ></i> Trở về</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->
@endsection
