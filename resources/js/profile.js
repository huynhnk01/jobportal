$(function () {
    // Bắt sự kiện click vào các nút "Chỉnh sửa"
    $('body').on('click', '#editPersonalBasicInfo', function () {
        $('#profileContent').html('<p class="text-gray-500">Đang tải...</p>');
        $.get('/profile/personal/basic-info', function (data) {
            $('#profileContent').html(data);
        }).fail(function () {
            $('#profileContent').html('<p class="text-red-500">Lỗi khi tải nội dung.</p>');
        });
    });

    $('body').on('submit', '#formPersonalInfo', function (e) {
        e.preventDefault();

        const formData = new FormData(this); // $(this).serialize(); // hoặc dùng FormData nếu có file
        formData.append('_method', 'PATCH'); // Laravel sẽ hiểu đây là PATCH

        console.log('Submitting form with data:', Object.fromEntries(formData.entries()));

        $.ajax({
            url: '/profile/personal/basic-info/update',
            type: 'POST',
            data: formData,
            processData: false, // Không xử lý dữ liệu
            contentType: false, // Không thiết lập header content-type
            success: function (response) {
                alert('Cập nhật thành công!');
                // hoặc reload lại phần profile bằng AJAX
            },
            error: function (xhr) {
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors;
                    // hiển thị lỗi từng trường nếu cần
                    alert(Object.values(errors).join('\n'));
                } else {
                    alert('Đã xảy ra lỗi, vui lòng thử lại.');
                }
            }
        });
    });

    $('body').on('change', '#avatarInput', function (e) {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#avatarPreview').attr('src', e.target.result).show();
            };
            reader.readAsDataURL(file);
        }
    });
});