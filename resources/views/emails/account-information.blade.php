<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Thông tin tài khoản</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #0f0f0f;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #007bff;
        }

        p {
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Thông tin tài khoản của bạn</h1>
        <p>Dưới đây là thông tin tài khoản và mật khẩu tạm thời của bạn:</p>
        <p><strong>Tài khoản:</strong> {{ $account->name_account }}</p>
        <p><strong>Mật khẩu tạm thời:</strong> {{ $password }}</p>
        <p>Chúng tôi tặng cho bạn mã giảm giá chào mừng thành viên mới cho đơn hàng sau</p>
        <p><strong>Mã giảm giá:</strong> {{ $discountCode }}</p>
        <p><strong>Ngày hết hạn:</strong> {{ $expirationDate->format('d/m/Y H:i:s') }}</p>
        <p>Vui lòng thay đổi mật khẩu sau khi đăng nhập.</p>
        <p>Xin cảm ơn!</p>
    </div>
</body>

</html>
