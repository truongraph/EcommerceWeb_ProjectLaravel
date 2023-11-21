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
                    <li class="breadcrumb-item active">Tìm kiếm sản phẩm</li>
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

        <div class="row">
            <div class="col-lg-12">
                <!-- shop-product-wrapper start -->
                <div class="shop-product-wrapper">
                    <div class="row align-itmes-center">
                    <div class="col"><span class="title-shop">Từ khoá: {{ $query }}</span></div>
                    </div>
                </div>
                <!-- shop-products-wrap start -->
                <div class="shop-products-wrap" id="list-product">
                    <div class="shop-product-wrap">
                        <div class="row row-8">
                            @forelse($products as $product)
                            <div class="product-col col-6 col-lg-item-5 ">
                                <div class="single-product-wrap mt-10">
                                    <div class="product-image">
                                        <a href="{{ route('products.show', ['linkProduct' => $product->link_product]) }}" title="">
                                            @php
                                                $images = explode(';', $product->image_product);
                                                $firstImage = reset($images);
                                            @endphp
                                            <img src="{{ asset('img/products/' . $product->id . '/' . $firstImage) }}"
                                                alt="{{ $product->name_product }}">
                                        </a>
                                        @if ($product->sellprice_product > 0)
                                            <span
                                                class="onsale">-{{ round((1 - $product->sellprice_product / $product->price_product) * 100) }}%</span>
                                        @endif
                                    </div>

                                    <div class="product-content">
                                        <h6 class="product-name"><a href="{{ route('products.show', ['linkProduct' => $product->link_product]) }}"
                                                title="">{{ $product->name_product }}</a></h6>
                                        <div class="price-box">
                                            @if ($product->sellprice_product > 0)
                                                @php
                                                    $formattedPrice = number_format($product->sellprice_product, 0, '.', ',');
                                                    $formattedPriceold = number_format($product->price_product, 0, '.', ',');
                                                @endphp
                                                <p class="new-price">{{ $formattedPrice }} đ</p>
                                                <p class="old-price">{{ $formattedPriceold }} đ</p>
                                            @endif
                                            @php
                                                $setemptysell = number_format($product->sellprice_product, 0, '.', ',');
                                            @endphp
                                            @if ($setemptysell === '0')
                                                @php
                                                    $formattedPrice = number_format($product->price_product, 0, '.', ',');
                                                @endphp

                                                <p class="new-price">{{ $formattedPrice }} đ</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Product End -->
                            </div>
                        @empty
                        <div class="col-lg-12"><p class="empty_cat">Không tìm thấy sản phẩm nào cho từ khoá "{{ $query }}". Vui lòng thử lại từ khoá khác</p></div>
                        @endforelse
                        </div>
                    </div>
                </div>
                <!-- shop-products-wrap end -->
            </div>
        </div>
    </div>
</div>
<!-- main-content-wrap end -->
@endsection







