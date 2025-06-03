$(function () {
    // Delegate click event for job cards
    $(document).on('click', '.cursor-pointer', function () {
        console.log('Job card clicked');
        // Add navigation logic here if needed
    });

    // Delegate click event for search button
    $(document).on('click', 'button:contains("Tìm Kiếm")', function () {
        console.log('Search button clicked');
        // Add search logic here if needed
    });
});