$(function () {
    // Form elements
    const $form = $('#resetPasswordForm');
    const $emailInput = $('#email');
    const $currentPasswordInput = $('#currentPassword');
    const $newPasswordInput = $('#newPassword');
    const $confirmPasswordInput = $('#confirmPassword');
    const $securityQuestionSelect = $('#securityQuestion');
    const $securityAnswerDiv = $('#securityAnswerDiv');
    const $securityAnswerInput = $('#securityAnswer');
    const $submitBtn = $('#submitBtn');

    // Password visibility toggles
    const $toggleCurrentPassword = $('#toggleCurrentPassword');
    const $toggleNewPassword = $('#toggleNewPassword');
    const $toggleConfirmPassword = $('#toggleConfirmPassword');

    // Validation elements
    const $emailError = $('#emailError');
    const $emailSuccess = $('#emailSuccess');
    const $newPasswordError = $('#newPasswordError');
    const $confirmError = $('#confirmError');
    const $confirmSuccess = $('#confirmSuccess');
    const $passwordStrength = $('#passwordStrength');
    const $strengthBar = $('#strengthBar');
    const $strengthText = $('#strengthText');

    // Alert elements
    const $alertContainer = $('#alertContainer');
    const $successAlert = $('#successAlert');
    const $errorAlert = $('#errorAlert');
    const $successMessage = $('#successMessage');
    const $errorMessage = $('#errorMessage');

    // Setup event listeners
    setupEventListeners();

    function setupEventListeners() {
        $emailInput.on('input blur', validateEmail);

        $toggleCurrentPassword.on('click', function () {
            togglePasswordVisibility($currentPasswordInput, $(this).find('i'));
        });

        $toggleNewPassword.on('click', function () {
            togglePasswordVisibility($newPasswordInput, $(this).find('i'));
        });

        $toggleConfirmPassword.on('click', function () {
            togglePasswordVisibility($confirmPasswordInput, $(this).find('i'));
        });

        $newPasswordInput.on('input', function () {
            const password = $(this).val();
            if (password.length > 0) {
                $passwordStrength.removeClass('hidden');
                checkPasswordStrength(password);
            } else {
                $passwordStrength.addClass('hidden');
            }
            validateForm();
        });

        $confirmPasswordInput.on('input', function () {
            checkPasswordMatch();
            validateForm();
        });

        $securityQuestionSelect.on('change', function () {
            if ($(this).val()) {
                $securityAnswerDiv.removeClass('hidden');
                $securityAnswerInput.focus();
            } else {
                $securityAnswerDiv.addClass('hidden');
                $securityAnswerInput.val('');
            }
        });

        $form.on('submit', function (e) {
            e.preventDefault();
            if (validateForm()) {
                submitResetPassword();
            }
        });

        $emailInput.add($newPasswordInput).add($confirmPasswordInput).on('input', validateForm);

        $newPasswordInput.on('input', function () {
            if (!$newPasswordError.hasClass('hidden')) {
                $newPasswordError.addClass('hidden');
                $(this).removeClass('border-red-500');
            }
        });

        $emailInput.focus();
    }

    function validateEmail() {
        const email = $emailInput.val().trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email.length === 0) {
            hideEmailValidation();
            return false;
        }

        if (!emailRegex.test(email)) {
            showEmailError('Định dạng email không hợp lệ');
            return false;
        } else {
            showEmailSuccess();
            return true;
        }
    }

    function showEmailError(message) {
        $emailError.removeClass('hidden').find('span').text(message);
        $emailSuccess.addClass('hidden');
        $emailInput.addClass('border-red-500').removeClass('border-green-500');
    }

    function showEmailSuccess() {
        $emailError.addClass('hidden');
        $emailSuccess.removeClass('hidden');
        $emailInput.removeClass('border-red-500').addClass('border-green-500');
    }

    function hideEmailValidation() {
        $emailError.add($emailSuccess).addClass('hidden');
        $emailInput.removeClass('border-red-500 border-green-500');
    }

    function togglePasswordVisibility($input, $icon) {
        if ($input.attr('type') === 'password') {
            $input.attr('type', 'text');
            $icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            $input.attr('type', 'password');
            $icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    }

    function checkPasswordStrength(password) {
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
    }

    function checkPasswordMatch() {
        const newPassword = $newPasswordInput.val();
        const confirmPassword = $confirmPasswordInput.val();

        if (confirmPassword.length === 0) {
            $confirmError.add($confirmSuccess).addClass('hidden');
            $confirmPasswordInput.removeClass('border-red-500 border-green-500');
            return false;
        }

        if (newPassword === confirmPassword) {
            $confirmError.addClass('hidden');
            $confirmSuccess.removeClass('hidden');
            $confirmPasswordInput.removeClass('border-red-500').addClass('border-green-500');
            return true;
        } else {
            $confirmSuccess.addClass('hidden');
            $confirmError.removeClass('hidden').find('span').text('Mật khẩu xác nhận không khớp');
            $confirmPasswordInput.removeClass('border-green-500').addClass('border-red-500');
            return false;
        }
    }

    function validateForm() {
        const email = $emailInput.val().trim();
        const newPassword = $newPasswordInput.val();
        const confirmPassword = $confirmPasswordInput.val();

        const isEmailValid = validateEmail();
        const hasNewPassword = newPassword.length >= 8;
        const isStrongPassword = checkPasswordStrength(newPassword);
        const isPasswordMatch = checkPasswordMatch();

        const isValid = isEmailValid && hasNewPassword && isStrongPassword && isPasswordMatch && confirmPassword.length > 0;
        $submitBtn.prop('disabled', !isValid);

        return isValid;
    }

    function submitResetPassword() {
        const $submitText = $submitBtn.find('.submit-text');
        const $loadingIcon = $submitBtn.find('.loading-icon');

        $submitBtn.prop('disabled', true);
        $submitText.text('Đang xử lý...');
        $loadingIcon.removeClass('hidden');

        hideAlerts();

        const formData = $form.serialize();

        $.ajax({
            url: '/reset-password',
            method: 'POST',
            data: formData,
            dataType: 'json',
            beforeSend: function () {
                $submitBtn.prop('disabled', true);
                $submitText.text('Đang xử lý...');
                $loadingIcon.removeClass('hidden');
                hideAlerts();
            },
            success: function (response) {
                $submitBtn.prop('disabled', false);
                $submitText.text('Đặt lại mật khẩu');
                $loadingIcon.addClass('hidden');

                if (response.success) {
                    showSuccess('Mật khẩu đã được đặt lại thành công! Bạn có thể đăng nhập với mật khẩu mới.');
                    setTimeout(() => {
                        window.location.href = '/login';
                    }, 3000);
                } else {
                    showError(response.message || 'Có lỗi xảy ra. Vui lòng thử lại.');
                }
            },
            error: function (xhr) {
                $submitBtn.prop('disabled', false);
                $submitText.text('Đặt lại mật khẩu');
                $loadingIcon.addClass('hidden');
                let message = 'Có lỗi xảy ra. Vui lòng thử lại.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
                showError(message);
            }
        });
    }

    function showSuccess(message) {
        $alertContainer.removeClass('hidden');
        $successAlert.removeClass('hidden');
        $errorAlert.addClass('hidden');
        $successMessage.text(message);
        $('html, body').animate({ scrollTop: 0 }, 'smooth');
    }

    function showError(message) {
        $alertContainer.removeClass('hidden');
        $errorAlert.removeClass('hidden');
        $successAlert.addClass('hidden');
        $errorMessage.text(message);
        $('html, body').animate({ scrollTop: 0 }, 'smooth');
    }

    function hideAlerts() {
        $alertContainer.add($successAlert).add($errorAlert).addClass('hidden');
    }
});
