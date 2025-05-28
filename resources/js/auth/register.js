$(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();
        const name = $('#full-name').val();
        const email = $('#email-address').val();
        const password = $('#password').val();
        const passwordConfirm = $('#password-confirm').val();
        const userType = $('input[name="user_type"]:checked').val();

        if (password !== passwordConfirm) {
            alert('Mật khẩu xác nhận không khớp!');
            return;
        }

        //console.log('Registration data:', { name, email, password, userType });
        //alert('Đăng ký thành công!');
        //window.location.href = 'login.html';
        this.submit();
    });
});
