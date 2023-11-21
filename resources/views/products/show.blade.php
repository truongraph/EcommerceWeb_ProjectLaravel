@extends('layouts.app')

@section('content')
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                    @if ($product->category)
                    <li class="breadcrumb-item"><a href="{{ route('categories.show',  $product->category->link_category) }}" title="">{{
                            $product->category->name_category }}</a></li>
                    @endif
                    <li class="breadcrumb-item active">{{ $product->name_product }}</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->

<div class="main-content-wrap shop-page section-ptb">
    <div class="container">
        <div class="row single-product-area product-details-inner">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                <div class="stick-gallery">
                    @if ($product->sellprice_product > 0)
                    <span class="sale-flag">-{{ round((1 - $product->sellprice_product / $product->price_product) * 100)
                        }}%</span>
                    @endif
                    <div class="product-large-slider">
                        @foreach ($imagePaths as $imagePath)
                        <div class="pro-large-img img-zoom">
                            <img src="{{ asset('img/products/' . $product->id . '/' . $imagePath) }}"
                                alt="product-details" />
                            <a href="{{ asset('img/products/' . $product->id . '/' . $imagePath) }}"
                                data-fancybox="images">
                                <i class='bx bx-zoom-in'></i>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="product-nav">
                        @foreach ($imagePaths as $imagePath)
                        <div class="pro-nav-thumb">
                            <img src="{{ asset('img/products/' . $product->id . '/' . $imagePath) }}"
                                alt="product-details" />
                        </div>
                        @endforeach
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content">
                    <div class="product-info">
                        <h3>{{ $product->name_product }}</h3>
                        <ul class="stock-cont">
                            <li class="product-sku">Danh mục: <span>{{ $product->category->name_category }}</span>
                            </li>
                            <li class="product-sku">Mã: <span>{{ $product->sku }}</span>
                            </li>
                            <li class="product-sku">Tình trạng:
                                @if ($product->quantity_product > 0)
                                <span class="text-success">Còn hàng</span>
                                @else
                                <span class="new-price ">Hết hàng</span>
                                @endif
                            </li>
                        </ul>
                        <div class="price-box">
                            @if ($product->sellprice_product > 0)
                            @php
                            $formattedPrice = number_format($product->sellprice_product, 0, '.', ',');
                            $formattedPriceold = number_format($product->price_product, 0, '.', ',');
                            @endphp
                            <p class="old-price">{{ $formattedPriceold }} đ</p>
                            <p class="new-price">{{ $formattedPrice }} đ</p>
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
                        <p class="short_desc">{{ $product->shortdesc_product }}</p>
                        <form id="addToCartForm" action="{{ route('cart.add') }}" method="post">
                            @csrf
                            <div class="d-flex gap-3">
                                <div class="select-opstion-box mb-20">
                                    <h6 class="title" for="size">Kích thước </h6>
                                    <select name="size" id="size" class="color-select">
                                        @foreach ($sizes as $size)
                                        <option value="{{ $size->id }}" class="attached enabled">
                                            {{ $size->desc_size }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="select-opstion-box mb-20">
                                    <h6 class="title" for="size">Màu sắc </h6>
                                    <select name="color" id="color" class="color-select">
                                        @foreach ($colors as $color)
                                        <option value="{{ $color->id }}" class="attached enabled">
                                            {{ $color->desc_color }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="single-add-to-cart">
                                <div class="media-total mb-3" bis_skin_checked="1">
                                    <div class="item-qty" style="width: 120px;" bis_skin_checked="1">
                                        <div class="quantity" bis_skin_checked="1">
                                            <input class="cart-plus-minus-box quantity-input" type="number"
                                                name="quantity" id="quantity" value="1">
                                            <div class="quantity-nav" bis_skin_checked="1">
                                                <button class="changeQuantity quantity-button quantity-up" type="button"
                                                    id="increaseQuantity" bis_skin_checked="1">+</button>
                                                <button class="changeQuantity quantity-button quantity-down"
                                                    type="button" id="decreaseQuantity" bis_skin_checked="1">-</button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    </div>
                                </div>
                                <button class="add-to-cart" type="submit">Thêm vào giỏ hàng</button>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="product-description-area section-pt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-details-tab">
                                <ul role="tablist" class="nav">
                                    <li class="active" role="presentation">
                                        <a data-bs-toggle="tab" role="tab" href="#description" class="active">Mô
                                            tả sản phẩm</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="product_details_tab_content tab-content">
                                <!-- Start Single Content -->
                                <div class="product_tab_content tab-pane active" id="description" role="tabpanel">
                                    <div class="product_description_wrap  mt-30">
                                        <div class="product_desc mb-30">
                                            {{ $product->desc_product }}
                                        </div>

                                    </div>
                                </div>
                                <!-- End Single Content -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-product-area section-pt">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3> Sản phẩm liên quan</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($relatedProducts as $product)
                <div class="product-col col-6 col-lg-item-5 ">
                    <div class="single-product-wrap mt-10">
                        <div class="product-image">
                            <a href="{{ route('products.show', ['linkProduct' => $product->link_product]) }}" title="">
                                <img src="{{ asset('img/products/' . $product->id . '/' . $product->avt_product) }}"
                                    alt="{{ $product->name_product }}">
                            </a>
                            @if ($product->sellprice_product > 0)
                            <span class="onsale">-{{ round((1 - $product->sellprice_product / $product->price_product) *
                                100) }}%</span>
                            @endif
                        </div>

                        <div class="product-content">
                            <h6 class="product-name"><a href="{{ route('products.show', ['linkProduct' => $product->link_product]) }}" title="">{{
                                    $product->name_product }}</a></h6>
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
                <strong class="text-center p-10 new-price">Không tìm thấy sản phẩm liên quan</strong>
                @endforelse

            </div>

        </div>
    </div>
</div>


<script>
    // Xử lý tăng giảm số lượng
        var quantityInput = document.getElementById('quantity');
        var decreaseButton = document.getElementById('decreaseQuantity');
        var increaseButton = document.getElementById('increaseQuantity');
        decreaseButton.addEventListener('click', function() {
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        });
        increaseButton.addEventListener('click', function() {
            quantityInput.value = parseInt(quantityInput.value) + 1;
        });
</script>
<script>
    // Xử lý chuyển hướng sau khi thêm vào giỏ hàng
        document.getElementById('addToCartForm').addEventListener('submit', function (event) {
    event.preventDefault();
    // Gửi Ajax request để thêm vào giỏ hàng
    axios.post('/cart/add', new FormData(this))
        .then(function (response) {
            toastr.success('Bạn đã thêm 1 sản phẩm vào giỏ hàng');
            setTimeout(function() {
                window.location.reload();
            }, 500);
        })
        .catch(function (error) {
            console.error(error);
        });
});
</script>
@endsection
