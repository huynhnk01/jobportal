$(function () {
    const $candidateRadio = $('#candidate');
    const $employerRadio = $('#employer');
    const $candidateForm = $('#candidate-form');
    const $employerForm = $('#employer-form');
    const $backButton = $('#back-button');
    const $continueButton = $('#continue-button');
    const $continueText = $('#continue-text');
    const $continueLoading = $('#continue-loading');
    const $continueArrow = $('#continue-arrow');

    initializeAccountTypeSelection();

    $candidateRadio.on('change', handleAccountTypeChange);
    $employerRadio.on('change', handleAccountTypeChange);
    $backButton.on('click', () => window.location.href = 'register.html');
    $continueButton.on('click', handleContinue);

    function initializeAccountTypeSelection() {
        const urlParams = new URLSearchParams(window.location.search);
        const accountType = urlParams.get('type') || localStorage.getItem('selectedAccountType') || 'candidate';

        if (accountType === 'employer') {
            $employerRadio.prop('checked', true);
        } else {
            $candidateRadio.prop('checked', true);
        }

        updateFormDisplay();
        updateAccountTypeCards();
    }

    function handleAccountTypeChange() {
        updateFormDisplay();
        updateAccountTypeCards();

        const selectedType = $candidateRadio.is(':checked') ? 'candidate' : 'employer';
        localStorage.setItem('selectedAccountType', selectedType);
    }

    function updateFormDisplay() {
        if ($candidateRadio.is(':checked')) {
            $candidateForm.removeClass('hidden');
            $employerForm.addClass('hidden');
        } else {
            $candidateForm.addClass('hidden');
            $employerForm.removeClass('hidden');
        }
    }

    function updateAccountTypeCards() {
        const $candidateCard = $('label[for="candidate"]');
        const $employerCard = $('label[for="employer"]');
        const $candidateCheck = $candidateCard.find('.check-mark');
        const $employerCheck = $employerCard.find('.check-mark');

        $candidateCard.removeClass('border-primary-500 bg-primary-50');
        $employerCard.removeClass('border-primary-500 bg-primary-50');
        $candidateCheck.addClass('hidden');
        $employerCheck.addClass('hidden');

        if ($candidateRadio.is(':checked')) {
            $candidateCard.addClass('border-primary-500 bg-primary-50');
            $candidateCheck.removeClass('hidden');
        } else {
            $employerCard.addClass('border-primary-500 bg-primary-50');
            $employerCheck.removeClass('hidden');
        }
    }

    function handleContinue() {
        const isCandidate = $candidateRadio.is(':checked');
        const isValid = isCandidate ? validateCandidateForm() : validateEmployerForm();

        if (isValid) {
            $continueButton.prop('disabled', true);
            $continueText.text('Đang xử lý...');
            $continueLoading.removeClass('hidden');
            $continueArrow.addClass('hidden');

            const formData = collectFormData();

            setTimeout(() => {
                $continueButton.prop('disabled', false);
                $continueText.text('Tiếp tục');
                $continueLoading.addClass('hidden');
                $continueArrow.removeClass('hidden');

                localStorage.setItem('registrationStep2Data', JSON.stringify(formData));
                window.location.href = 'register-step3.html';
            }, 1500);
        }
    }

    function validateCandidateForm() {
        let isValid = true;
        const requiredFields = [
            'candidate-title', 'candidate-dob', 'candidate-gender', 'candidate-address', 'candidate-phone',
            'candidate-experience', 'candidate-skills'
        ];

        requiredFields.forEach(id => {
            const $field = $('#' + id);
            const $error = $('#' + id + '-error');
            if (!$field.val().trim()) {
                showFieldError($error, 'Trường này là bắt buộc');
                $field.addClass('border-red-500');
                isValid = false;
            } else {
                hideFieldError($error);
                $field.removeClass('border-red-500');
            }
        });

        const $dob = $('#candidate-dob');
        if ($dob.val()) {
            const dob = new Date($dob.val());
            const age = new Date().getFullYear() - dob.getFullYear();
            if (age < 16 || age > 100) {
                showFieldError($('#candidate-dob-error'), 'Tuổi phải từ 16 đến 100');
                $dob.addClass('border-red-500');
                isValid = false;
            }
        }
        return isValid;
    }

    function validateEmployerForm() {
        let isValid = true;
        const requiredFields = [
            'company-name', 'company-size', 'company-industry',
            'company-address', 'tax-code', 'position', 'company-description'
        ];

        requiredFields.forEach(id => {
            const $field = $('#' + id);
            const $error = $('#' + id + '-error');
            if (!$field.val().trim()) {
                showFieldError($error, 'Trường này là bắt buộc');
                $field.addClass('border-red-500');
                isValid = false;
            } else {
                hideFieldError($error);
                $field.removeClass('border-red-500');
            }
        });

        const $taxCode = $('#tax-code');
        if ($taxCode.val() && !/^\d{10,13}$/.test($taxCode.val().trim())) {
            showFieldError($('#tax-code-error'), 'Mã số thuế phải có 10-13 chữ số');
            $taxCode.addClass('border-red-500');
            isValid = false;
        }

        const $website = $('#company-website');
        if ($website.val()) {
            try {
                new URL($website.val().trim());
            } catch {
                showFieldError($('#company-website-error'), 'URL không hợp lệ');
                $website.addClass('border-red-500');
                isValid = false;
            }
        }
        return isValid;
    }

    function collectFormData() {
        const isCandidate = $candidateRadio.is(':checked');
        const data = { account_type: isCandidate ? 'candidate' : 'employer' };

        if (isCandidate) {
            data.candidate = {
                title: $('#candidate-title').val(),
                date_of_birth: $('#candidate-dob').val(),
                gender: $('#candidate-gender').val(),
                address: $('#candidate-address').val(),
                phone: $('#candidate-phone').val(),
                experience_level: $('#candidate-experience').val(),
                desired_salary: $('#candidate-salary').val(),
                skills: $('#candidate-skills').val(),
                bio: $('#candidate-bio').val(),
            };
        } else {
            data.employer = {
                company_name: $('#company-name').val(),
                company_size: $('#company-size').val(),
                industry: $('#company-industry').val(),
                company_address: $('#company-address').val(),
                tax_code: $('#tax-code').val(),
                website: $('#company-website').val(),
                position: $('#position').val(),
                company_description: $('#company-description').val(),
                benefits: $('#company-benefits').val(),
            };
        }
        return data;
    }

    function showFieldError($el, message) {
        $el.text(message).removeClass('hidden');
    }

    function hideFieldError($el) {
        $el.addClass('hidden');
    }

    $('input, select, textarea').on('input', function () {
        const $error = $('#' + this.id + '-error');
        if ($error.length && !$error.hasClass('hidden')) {
            hideFieldError($error);
            $(this).removeClass('border-red-500');
        }
    });

    updateFormDisplay();
    updateAccountTypeCards();
});
