$(document).ready(function () {
    // Xử lý khi click vào các thẻ job card
    $('.cursor-pointer').on('click', function () {
        console.log('Job card clicked');
        // Thêm logic chuyển trang tại đây nếu cần
    });

    // Xử lý nút tìm kiếm
    $('button:contains("Tìm Kiếm")').on('click', function () {
        console.log('Search button clicked');
        // Thêm logic tìm kiếm tại đây nếu cần
    });
});