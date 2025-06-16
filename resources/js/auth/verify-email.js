$(function () {
    const $resendBtn = $('#resendBtn');
    const $statusTag = $('.inline-flex.bg-yellow-100');

    function checkEmailVerification() {
        $.ajax({
            url: '/email-status',
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function (data) {
                if (data.verified) {
                    if ($statusTag.length) {
                        $statusTag.text('Đã xác thực');
                        $statusTag.removeClass('bg-yellow-100 text-yellow-800')
                            .addClass('bg-green-100 text-green-800');
                    }

                    $resendBtn.prop('disabled', true);
                    $resendBtn.find('.loading-icon').addClass('hidden');
                }
            }
        });
    }

    // Kiểm tra mỗi 5 giây
    setInterval(checkEmailVerification, 5000);
});