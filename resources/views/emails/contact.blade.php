<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liên hệ mới</title>
</head>
<body>
    <h2>Thông tin liên hệ mới</h2>
    <p><strong>Họ tên:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p><strong>Tin nhắn:</strong></p>
    <p>{{ $contact->message }}</p>
</body>
</html>
