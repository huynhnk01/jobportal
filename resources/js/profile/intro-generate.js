$(function () {
    $('button[name="type"]').on('click', function () {
        const type = this.value;
        const title = $('#candidate-title').val();
        const experience = $('#candidate-experience').val();
        const skills = $('#skills').val();
        const content = $('#candidate-bio').val();

        $.ajax({
            url: '/profile/intro/generate',
            method: 'POST',
            data: {
                type: type,
                title: title,
                experience: experience,
                skills: skills,
                content: content,
            },
            success: function (response) {
                $('#candidate-bio').val(response.ai_intro);
            },
            error: function (xhr) {
                // console.error('Lỗi:', xhr.responseText);
                $('#candidate-title-error').text('Không thể tạo giới thiệu. Vui lòng thử lại.').removeClass('hidden');
            }
        });
    });
});