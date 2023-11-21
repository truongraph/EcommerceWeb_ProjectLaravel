<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Khôi phục mật khẩu</title>
    <style>
        /* Thêm CSS để làm đẹp email */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        p {
            color: #555;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Khôi phục mật khẩu</h2>
        <p>Xin chào</p>
        <p>Bạn đang nhận được email này vì chúng tôi đã nhận được yêu cầu khôi phục mật khẩu cho tài khoản của bạn.</p>
        <p>Nếu bạn không yêu cầu khôi phục mật khẩu, không cần thực hiện thêm bất kỳ hành động nào.</p>
        <p><a href="{{ route('reset.password.form', ['token' => $token]) }}">Khôi phục mật khẩu</a></p>
        <p>Cảm ơn bạn.</p>
    </div>
</body>
</html>
