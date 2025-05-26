$(document).ready(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();

        const email = $('#email-address').val();
        const password = $('#password').val();

        // Gửi dữ liệu login (giả lập)
        console.log('Login attempt:', { email, password });

        alert('Đăng nhập thành công!');
        window.location.href = 'index.html';
    });
});