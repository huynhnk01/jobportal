$(function () {
    const $form = $('form');
    const $serverErrors = $('#server-errors');
    const $nameInput = $('#full-name');
    const $emailInput = $('#email-address');
    const $passwordInput = $('#password');
    const $passwordStrength = $('#passwordStrength');
    const $strengthBar = $('#strengthBar');
    const $strengthText = $('#strengthText');
    const $togglePassword = $('#toggle-password');
    const $passwordConfirmInput = $('#password-confirm');
    const $togglePasswordConfirm = $('#toggle-password-confirm');
    const $registerButton = $('#register-button');
    const $buttonText = $('#button-text');
    const $loadingIcon = $('#loading-icon');

    // Xử lý submit form
    let isSubmitting = false;

    $form.on('submit', function (e) {
        e.preventDefault();

        if (isSubmitting) return;

        $registerButton.prop('disabled', true);
        $buttonText.text('Đang xử lý...');
        $loadingIcon.removeClass('hidden');

        if (validateForm()) {
            isSubmitting = true;
            this.submit();
        } else {
            $registerButton.prop('disabled', false);
            $buttonText.text('Đăng ký');
            $loadingIcon.addClass('hidden');
        }
    });

    // Kiểm tra tính hợp lệ của tất cả các trường khi người dùng submit form
    function validateForm() {
        const isNameValid = validateName();
        const isEmailValid = validateEmail();
        const isPasswordValid = validatePassword();
        const isPasswordConfirmValid = validatePasswordConfirmation();
        const isTermsChecked = validateTerms();

        const isValid = isNameValid && isEmailValid && isPasswordValid && isPasswordConfirmValid && isTermsChecked;
        $registerButton.prop('disabled', !isValid);

        return isValid;
    }

    function validateName() {
        const name = $nameInput.val().trim();
        const $error = $('#name-error');
        if (name.length === 0) {
            showError($error, 'Họ và tên là trường bắt buộc');
            return false;
        } else if (name.length < 2) {
            showError($error, 'Họ và tên phải có ít nhất 2 ký tự');
            return false;
        } else {
            hideError($error);
            return true;
        }
    }

    function validateEmail() {
        const email = $emailInput.val().trim();
        const $error = $('#email-error');
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (email.length === 0) {
            showError($error, 'Email là trường bắt buộc');
            return false;
        } else if (!emailRegex.test(email)) {
            showError($error, 'Email không hợp lệ');
            return false;
        } else {
            hideError($error);
            return true;
        }
    }

    function validatePassword() {
        const password = $passwordInput.val();
        const $error = $('#password-error');
        if (password.length === 0) {
            showError($error, 'Mật khẩu là trường bắt buộc');
            return false;
        } else if (password.length < 8) {
            showError($error, 'Mật khẩu phải có ít nhất 8 ký tự');
            return false;
        } else if (!/[A-Z]/.test(password)) {
            showError($error, 'Mật khẩu phải có ít nhất 1 chữ hoa');
            return false;
        } else if (!/[a-z]/.test(password)) {
            showError($error, 'Mật khẩu phải có ít nhất 1 chữ thường');
            return false;
        } else if (!/[0-9]/.test(password)) {
            showError($error, 'Mật khẩu phải có ít nhất 1 số');
            return false;
        } else if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
            showError($error, 'Mật khẩu phải có ít nhất 1 ký tự đặc biệt');
            return false;
        } else {
            hideError($error);
            return true;
        }
    }

    function validatePasswordConfirmation() {
        const password = $passwordInput.val();
        const confirm = $passwordConfirmInput.val();
        const $error = $('#password-confirmation-error');
        if (confirm.length === 0) {
            showError($error, 'Xác nhận mật khẩu là trường bắt buộc');
            return false;
        } else if (password !== confirm) {
            showError($error, 'Mật khẩu xác nhận không khớp');
            return false;
        } else {
            hideError($error);
            return true;
        }
    }

    function validateTerms() {
        const termsChecked = $('#terms').prop('checked');
        const $termsError = $('#terms-error');
        if (!termsChecked) {
            showError($termsError, 'Bạn phải đồng ý với điều khoản sử dụng');
            return false;
        } else {
            hideError($termsError);
            return true;
        }
    }

    function showError($element, message) {
        $element.text(message).removeClass('hidden');
        $element.parent().find('input').addClass('border-red-500');
    }

    function hideError($element) {
        $element.addClass('hidden');
        $element.parent().find('input').removeClass('border-red-500');
    }

    // Thao tác ẩn hiện mật khẩu
    $togglePassword.on('click', function () {
        togglePasswordVisibility('#password', $(this).find('i'));
    });

    // Thao tác ẩn hiện mật khẩu xác nhận
    $togglePasswordConfirm.on('click', function () {
        togglePasswordVisibility('#password-confirm', $(this).find('i'));
    });

    // Xử lý ẩn hiện mật khẩu
    function togglePasswordVisibility(inputSelector, $icon) {
        const $input = $(inputSelector);
        if ($input.attr('type') === 'password') {
            $input.attr('type', 'text');
            $icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            $input.attr('type', 'password');
            $icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    }

    // Xử lý sự kiện blur để kiểm tra tính hợp lệ của từng trường khi nhập liệu
    $nameInput.on('blur', validateName);
    $emailInput.on('blur', validateEmail);
    $passwordInput.on('blur', validatePassword);
    $passwordConfirmInput.on('blur', validatePasswordConfirmation);

    // Kiểm tra độ mạnh mật khẩu khi người dùng nhập liệu
    $passwordStrength.addClass('hidden');
    $passwordInput.on('input', function () {
        checkPasswordStrength();
    });

    function checkPasswordStrength() {
        const password = $passwordInput.val();
        if (password.length > 0) {
            $passwordStrength.removeClass('hidden');
            let score = 0;
            const requirements = {
                length: password.length >= 8,
                uppercase: /[A-Z]/.test(password),
                lowercase: /[a-z]/.test(password),
                number: /\d/.test(password),
                special: /[!@#$%^&*(),.?":{}|<>]/.test(password)
            };

            $.each(requirements, function (key, met) {
                const $req = $(`#req-${key}`);
                const $icon = $req.find('i');
                const $text = $req.find('span');

                if (met) {
                    score++;
                    $icon.removeClass('fa-circle text-gray-500').addClass('fa-check-circle text-green-500');
                    $text.removeClass('text-gray-500').addClass('text-green-600');
                } else {
                    $icon.removeClass('fa-check-circle text-green-500').addClass('fa-circle text-gray-500');
                    $text.removeClass('text-green-600').addClass('text-gray-500');
                }
            });

            const percentage = (score / 5) * 100;
            $strengthBar.css('width', percentage + '%');

            if (score < 2) {
                $strengthBar.attr('class', 'h-2 rounded-full transition-all duration-300 bg-red-500');
                $strengthText.text('Yếu').attr('class', 'text-sm font-medium text-red-600');
            } else if (score < 4) {
                $strengthBar.attr('class', 'h-2 rounded-full transition-all duration-300 bg-yellow-500');
                $strengthText.text('Trung bình').attr('class', 'text-sm font-medium text-yellow-600');
            } else {
                $strengthBar.attr('class', 'h-2 rounded-full transition-all duration-300 bg-green-500');
                $strengthText.text('Mạnh').attr('class', 'text-sm font-medium text-green-600');
            }

            return score >= 3;
        } else {
            $passwordStrength.addClass('hidden');
        }
    }

    $passwordConfirmInput.on('input', function () {
        checkPasswordMatch();
    });

    function checkPasswordMatch() {
        const password = $passwordInput.val();
        const passwordConfirm = $passwordConfirmInput.val();
        const $confirmSuccess = $('#confirmSuccess');
        const $confirmError = $('#password-confirmation-error');

        if (password === passwordConfirm) {
            $confirmError.addClass('hidden');
            $confirmSuccess.removeClass('hidden');
            $passwordConfirmInput.removeClass('border-red-500').addClass('border-green-500');
            return true;
        } else {
            $confirmSuccess.addClass('hidden');
            $confirmError.removeClass('hidden').find('span').text('Mật khẩu xác nhận không khớp');
            $passwordConfirmInput.removeClass('border-green-500').addClass('border-red-500');
            return false;
        }
    }

    // Xử lý xoá tất cả thông báo lỗi khi người dùng nhập liệu trở lại
    $('input').on('input', function () {
        const $error = $('#' + this.name + '-error');
        if ($error.length && !$error.hasClass('hidden')) {
            hideError($error);
        }
        // Trường hợp lỗi tổng từ server backend
        if (!$serverErrors.hasClass('hidden')) {
            $serverErrors.addClass('hidden');
        }
    });
});
