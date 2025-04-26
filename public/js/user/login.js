document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Ngừng hành động mặc định của form (không gửi lại trang)

    // Lấy giá trị từ các trường input
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    // Kiểm tra nếu cả email và password không rỗng
    if (email && password) {
        // Gửi yêu cầu đăng nhập đến API của bạn
        fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                email: email,
                password: password,
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.token) {
                // Nếu đăng nhập thành công, lưu token vào localStorage
                localStorage.setItem('auth_token', data.token);

                // Điều hướng đến trang dashboard hoặc nơi cần thiết
                window.location.href = '/dashboard'; 
            } else {
                // Hiển thị thông báo lỗi nếu không có token (sai email/mật khẩu)
                document.getElementById('message').innerHTML = 'Email hoặc mật khẩu không chính xác.';
                document.getElementById('message').style.color = 'red';
            }
        })
        .catch(error => {
            console.error('Có lỗi xảy ra:', error);
            document.getElementById('message').innerHTML = 'Đã có lỗi khi đăng nhập. Vui lòng thử lại!';
            document.getElementById('message').style.color = 'red';
        });
    } else {
        document.getElementById('message').innerHTML = 'Vui lòng điền đầy đủ thông tin.';
        document.getElementById('message').style.color = 'red';
    }
});
