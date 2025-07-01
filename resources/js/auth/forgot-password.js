$(function () {
    const $form = $('#forgotPasswordForm');
    const $step1 = $('#step1');
    const $step2 = $('#step2');
    const $emailInput = $('#email');
    const $emailError = $('#emailError');
    const $submitBtn = $('#submitBtn');
    const $submitText = $('#submitText');
    const $loadingIcon = $('#loading-icon');
    const $sentEmail = $('#sentEmail');
    const $resendBtn = $('#resendBtn');
    const $resendTimer = $('#resendTimer');
    const $countdown = $('#countdown');

    let countdownInterval;

    // Xử lý submit form
    let isSubmitting = false;

    $form.on('submit', async function (e) {
        e.preventDefault();

        if (isSubmitting) return;

        if (!validateEmail()) return;

        setLoading(true);

        const email = $emailInput.val().trim();

        $.ajax({
            url: '/forgot-password',
            method: 'POST',
            data: { email },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    showStep2(email);
                } else {
                    showError(response.message || 'Có lỗi xảy ra. Vui lòng thử lại sau');
                }
            },
            error: function (xhr) {
                const response = xhr.responseJSON;
                if (response?.error === 'EMAIL_NOT_FOUND') {
                    showError('Email này chưa được đăng ký trong hệ thống');
                } else if (response?.errors?.email) {
                    showError(response.errors.email[0]);
                } else {
                    showError('Có lỗi xảy ra. Vui lòng thử lại sau');
                }
            },
            complete: function () {
                setLoading(false);
            }
        });
    });

    function validateEmail() {
        const email = $emailInput.val().trim();
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!email) {
            showError('Vui lòng nhập email');
            $emailInput.trigger('focus');
            return false;
        } else if (!emailRegex.test(email)) {
            showError('Email không hợp lệ');
            $emailInput.trigger('focus');
            return false;
        } else {
            hideError();
            return true;
        }
    }

    function setLoading(isLoading) {
        $submitBtn.prop('disabled', isLoading);
        if (isLoading) {
            $submitText.text('Đang gửi...');
            $loadingIcon.removeClass('hidden');
        } else {
            $submitText.text('Gửi link đặt lại mật khẩu');
            $loadingIcon.addClass('hidden');
        }
    }

    function showStep2(email) {
        $sentEmail.text(email);
        $step1.addClass('hidden');
        $step2.removeClass('hidden');
        startCountdown();
    }

    function startCountdown() {
        let timeLeft = 60;
        $countdown.text(timeLeft);
        $resendBtn.prop('disabled', true);
        $resendTimer.removeClass('hidden');

        countdownInterval = setInterval(() => {
            timeLeft--;
            $countdown.text(timeLeft);

            if (timeLeft <= 0) {
                clearInterval(countdownInterval);
                $resendTimer.addClass('hidden');
                $resendBtn.prop('disabled', false);
            }
        }, 1000);
    }

    function showError(message) {
        $emailError.find('span').text(message);
        $emailError.removeClass('hidden');
        $emailInput.addClass('border-red-500 focus:border-red-500 focus:ring-red-500');
    }

    function hideError() {
        $emailError.addClass('hidden');
        $emailInput.removeClass('border-red-500 focus:border-red-500 focus:ring-red-500');
    }

    $resendBtn.on('click', async function () {
        const email = $sentEmail.text();

        $resendBtn.prop('disabled', true);
        const originalText = $resendBtn.html();
        $resendBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Đang gửi...');

        $.ajax({
            url: '/forgot-password',
            method: 'POST',
            data: { email },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    const $successMsg = $('<div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-md shadow-lg z-50 transition-all duration-300">' +
                        '<i class="fas fa-check mr-2"></i>Email đã được gửi lại!</div>');
                    $('body').append($successMsg);

                    setTimeout(() => {
                        $successMsg.css('opacity', '0');
                        setTimeout(() => $successMsg.remove(), 300);
                    }, 3000);

                    startCountdown();
                } else {
                    const $errorMsg = $('<div class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-md shadow-lg z-50 transition-all duration-300">' +
                        '<i class="fas fa-times mr-2"></i>Có lỗi xảy ra. Vui lòng thử lại!</div>');
                    $('body').append($errorMsg);

                    setTimeout(() => {
                        $errorMsg.css('opacity', '0');
                        setTimeout(() => $errorMsg.remove(), 300);
                    }, 3000);

                    $resendBtn.prop('disabled', false);
                }
            },
            error: function () {
                const $errorMsg = $('<div class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-md shadow-lg z-50 transition-all duration-300">' +
                    '<i class="fas fa-times mr-2"></i>Có lỗi xảy ra. Vui lòng thử lại!</div>');
                $('body').append($errorMsg);

                setTimeout(() => {
                    $errorMsg.css('opacity', '0');
                    setTimeout(() => $errorMsg.remove(), 300);
                }, 3000);

                $resendBtn.prop('disabled', false);
            },
            complete: function () {
                $resendBtn.html(originalText);
            }
        });
    });

    $emailInput.on('input', function () {
        if ($emailError.hasClass('hidden')) return;
        const email = $(this).val().trim();
        if (email && validateEmail(email)) hideError();
    });

    $emailInput.on('focus', function () {
        if (!$(this).val()) $(this).attr('placeholder', 'VD: nguyenvana@example.com');
    });

    $emailInput.on('blur', function () {
        $(this).attr('placeholder', 'Nhập email của bạn');
    });
});
