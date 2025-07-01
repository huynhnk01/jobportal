$(function () {
    const $resendBtn = $('#resendBtn');
    const $statusTag = $('#statusTag');
    let intervalId = null;

    function checkEmailVerification() {
        $.ajax({
            url: '/verify-email-status',
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
                    $resendBtn.find('#loading-icon').addClass('hidden');

                    // Dừng kiểm tra định kỳ
                    if (intervalId) {
                        clearInterval(intervalId);
                        intervalId = null;
                    }
                }
            }
        });
    }

    // Kiểm tra mỗi 5 giây
    intervalId = setInterval(checkEmailVerification, 10000);
});