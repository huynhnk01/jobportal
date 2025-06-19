$(function () {
    $('button[name="type"]').on('click', function () {
        const type = this.value;
        const yoe = $('#candidate-experience').val();
        const skills = $('#skills').val();

        $.ajax({
            url: '/profile/intro/generate',
            method: 'POST',
            data: {
                type: type,
                yoe: yoe,
                skills: skills
            },
            success: function (response) {
                $('#candidate-bio').text(response.ai_intro);
            },
            error: function (xhr) {
                console.error('Lỗi:', xhr.responseText);
                alert('Không thể tạo giới thiệu. Vui lòng thử lại.');
            }
        });
    });
});