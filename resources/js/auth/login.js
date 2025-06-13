$(function () {
    $('form').on('submit', function (e) {
        e.preventDefault();

        const email = $('#email-address').val().trim();
        const password = $('#password').val();

        if (!email || !password) {
            $('#client-errors').removeClass('hidden');
            $('#client-errors').find('h3').text('Vui lòng nhập đầy đủ email và mật khẩu.');
            return;
        }

        // Check if email is in valid format
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailRegex.test(email)) {
            $('#client-errors').removeClass('hidden');
            $('#client-errors').find('h3').text('Email không đúng định dạng.');
            return;
        }

        this.submit();
    });
});
