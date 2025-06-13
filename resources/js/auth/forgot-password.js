$(function () {
    const $form = $('#forgotPasswordForm');
    const $step1 = $('#step1');
    const $step2 = $('#step2');
    const $emailInput = $('#email');
    const $emailError = $('#emailError');
    const $submitBtn = $form.find('button[type="submit"]');
    const $submitText = $submitBtn.find('.submit-text');
    const $loadingIcon = $('#loading-icon');
    const $sentEmail = $('#sentEmail');
    const $resendBtn = $('#resendBtn');
    const $resendTimer = $('#resendTimer');
    const $countdown = $('#countdown');

    let countdownInterval;

    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
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

    function setLoading(loading) {
        $submitBtn.prop('disabled', loading);
        if (loading) {
            $submitText.text('Đang gửi...');
            $loadingIcon.removeClass('hidden');
        } else {
            $submitText.text('Gửi link đặt lại mật khẩu');
            $loadingIcon.addClass('hidden');
        }
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

    function showStep2(email) {
        $sentEmail.text(email);
        $step1.addClass('hidden');
        $step2.removeClass('hidden');
        startCountdown();
    }

    function showStep1() {
        $step2.addClass('hidden');
        $step1.removeClass('hidden');
        if (countdownInterval) clearInterval(countdownInterval);
    }

    $form.on('submit', async function (e) {
        e.preventDefault();
        hideError();

        const email = $emailInput.val().trim();

        if (!email) {
            showError('Vui lòng nhập email');
            $emailInput.focus();
            return;
        }

        if (!validateEmail(email)) {
            showError('Email không hợp lệ');
            $emailInput.focus();
            return;
        }

        setLoading(true);

        try {
            const response = await $.ajax({
                url: '/forgot-password',
                method: 'POST',
                data: { email },
                dataType: 'json'
            });

            if (response.success) {
                showStep2(email);
            } else {
                showError(response.message || 'Có lỗi xảy ra. Vui lòng thử lại');
            }
        } catch (error) {
            const response = error.responseJSON;

            if (response?.error === 'EMAIL_NOT_FOUND') {
                showError('Email này chưa được đăng ký trong hệ thống');
            } else if (response?.errors?.email) {
                showError(response.errors.email[0]);
            } else {
                showError('Có lỗi xảy ra. Vui lòng thử lại sau');
            }
        } finally {
            setLoading(false);
        }
    });

    $resendBtn.on('click', async function () {
        const email = $sentEmail.text();

        $resendBtn.prop('disabled', true);
        const originalText = $resendBtn.html();
        $resendBtn.html('<i class="fas fa-spinner fa-spin mr-2"></i>Đang gửi...');

        try {
            await new Promise(resolve => setTimeout(resolve, 1500));

            const $successMsg = $('<div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-md shadow-lg z-50 transition-all duration-300">' +
                '<i class="fas fa-check mr-2"></i>Email đã được gửi lại!</div>');
            $('body').append($successMsg);

            setTimeout(() => {
                $successMsg.css('opacity', '0');
                setTimeout(() => $successMsg.remove(), 300);
            }, 3000);

            startCountdown();

        } catch (error) {
            const $errorMsg = $('<div class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-md shadow-lg z-50 transition-all duration-300">' +
                '<i class="fas fa-times mr-2"></i>Có lỗi xảy ra. Vui lòng thử lại!</div>');
            $('body').append($errorMsg);

            setTimeout(() => {
                $errorMsg.css('opacity', '0');
                setTimeout(() => $errorMsg.remove(), 300);
            }, 3000);

            $resendBtn.prop('disabled', false);
        } finally {
            $resendBtn.html(originalText);
        }
    });

    $emailInput.on('input', function () {
        if ($emailError.hasClass('hidden')) return;
        const email = $(this).val().trim();
        if (email && validateEmail(email)) hideError();
    });

    $emailInput.trigger('focus');

    $emailInput.on('focus', function () {
        if (!$(this).val()) $(this).attr('placeholder', 'VD: nguyenvana@example.com');
    });

    $emailInput.on('blur', function () {
        $(this).attr('placeholder', 'Nhập email của bạn');
    });
});
