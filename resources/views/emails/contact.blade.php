<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thông tin liên hệ</title>
    <style>
        /* Định dạng cho email */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        .info {
            margin-bottom: 20px;
        }
        .info p {
            margin: 5px 0;
        }
        .message {
            padding: 10px;
            background-color: #f9f9f9;
            border-left: 4px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thông tin liên hệ</h1>
        <div class="info">
            <p><strong>Họ tên:</strong> {{ $fullname }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Số điện thoại:</strong> {{ $phone }}</p>
            <p><strong>Tiêu đề thư:</strong> {{ $title }}</p>
        </div>
        <div class="message">
            <strong>Nội dung:</strong>
            <p>{{ $content }}</p>
        </div>
    </div>
</body>
</html>
