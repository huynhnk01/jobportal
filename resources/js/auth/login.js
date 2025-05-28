$(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();

        const email = $.trim($('#email-address').val());
        const password = $('#password').val();

        if (!email || !password) {
            alert('Vui lòng nhập đầy đủ email và mật khẩu.');
            return;
        }

        // Replace alert and redirect with a more robust solution in production
        //alert('Đăng nhập thành công!');
        //window.location.href = 'index.html';
        this.submit();
    });
});