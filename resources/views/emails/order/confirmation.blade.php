<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
        }

        p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ccc;
        }
        .flexitem {
            display: flex;
            gap: 25px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Đặt hàng thành công</h1>
        <p>Kính gửi anh/chị {{ $order->name_order }},</p>

        <p>Cảm ơn bạn đã đặt hàng của bạn. Chúng tôi đã nhận được đơn đặt hàng của bạn với các chi tiết sau:</p>
        <h3>Thông tin đặt hàng</h3>
        <div class="flexitem">
            <p>Mã đơn hàng: #{{ $order->code_order }}</p>
            <p style="margin-left: 20px">Ngày đặt hàng: {{ $order->date_order->format('d/m/Y H:i:s') }}</p>
            <p style="margin-left: 20px">Họ tên: {{ $order->name_order }}</p>
        </div>
        <div class="flexitem">
            <p>Số điện thoại: {{ $order->phone_order }}</p>
            <p style="margin-left: 20px">Email: {{ $order->email_order }}</p>
            <p style="margin-left: 20px">Địa chỉ: {{ $order->address_order }}</p>
        </div>
        <p>Ghi chú: {{ $order->note }}</p>
        <p>Phương thức thanh toán: {{ $order->paymentmethod->name_payment }}</p>
        <table>
            <thead>
                <tr>
                    {{-- <th>Hình</th> --}}
                    <th>Tên sản phẩm</th>
                    <th>Size</th>
                    <th>Màu</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderDetails as $orderDetail)
                @php
                $product = \App\Models\Product::find($orderDetail->productid);
                $size = $orderDetail->sizes;
                $color = $orderDetail->colors;
                $price = $product->sellprice_product > 0 ? $product->sellprice_product : $product->price_product;
                @endphp
                <tr>
                    {{-- <td>
                        <img src="{{ asset('img/products/' . $product->id . '/' . $product->avt_product) }}"
                        alt="{{ $product->name_product }}"
                        style="max-width: 70px;">
                    </td> --}}
                    <td>{{ $product->name_product }}</td>
                    <td>{{ $size ? $size->desc_size : '' }}</td>
                    <td>{{ $color ? $color->desc_color : '' }}</td>
                    <td>{{ number_format($price) }} đ</td>
                    <td>{{ $orderDetail->quantity }}</td>
                    <td>{{ number_format($orderDetail->totalprice) }} đ</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p>Mã giảm giá: {{ $order->discount_code }}</p>
       <p> Tổng tiền: {{ number_format($order->total_order) }} đ</p>

        <p>Cảm ơn bạn đã mua hàng!</p>
    </div>
    <div class="footer">
        &copy; 2023 Doantotnghiep
    </div>
</body>

</html>
