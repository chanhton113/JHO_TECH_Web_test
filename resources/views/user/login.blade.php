<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="{{ asset('css/user/login.css') }}">
</head>
<body>
    <div class="login-container">
        <h2>Đăng nhập</h2>
        <div id="message"></div>
        <form id="loginForm">
            <input type="email" id="email" placeholder="Email" required>
            <input type="password" id="password" placeholder="Mật khẩu" required>
            <button type="submit">Đăng nhập</button>
        </form>
    </div>

    <script src="{{ asset('js/user/login.js') }}"></script>
</body>
</html>
