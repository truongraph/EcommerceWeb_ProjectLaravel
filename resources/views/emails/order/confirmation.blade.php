<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #1a1a1a;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            margin-top: 0;
            color: #181818;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #181818;
            font-size: 0.8em;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Đặt hàng thành công</h1>
        <p>Kính gửi anh/chị {{ $order->name_order }},</p>

        <p>Cảm ơn bạn đã đặt hàng. Chúng tôi đã nhận được đơn đặt hàng của bạn với các chi tiết sau:</p>

        <h3>Thông tin đặt hàng</h3>
        <div>
            <p>Mã đơn hàng: #{{ $order->code_order }}</p>
            <p>Ngày đặt hàng: {{ $order->date_order->format('d/m/Y H:i:s') }}</p>
            <p>Họ tên: {{ $order->name_order }}</p>
            <p>Số điện thoại: {{ $order->phone_order }}</p>
            <p>Email: {{ $order->email_order }}</p>
            <p>Địa chỉ: {{ $order->address_order }}</p>
        </div>

        <h3>Chi tiết đơn hàng</h3>
        <table>
            <thead>
                <tr>
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
        <p>Tổng tiền: {{ number_format($order->total_order) }} đ</p>

        <p>Cảm ơn bạn đã mua hàng!</p>
    </div>
    <div class="footer">
        &copy; 2023 Doantotnghiep
    </div>
</body>

</html>
