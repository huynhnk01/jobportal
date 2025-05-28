$(function () {
    // Cache selectors
    const $body = $('body');
    const $mobileMenuBtn = $('.mobile-menu-btn');
    const $mobileMenu = $('.mobile-menu');
    const $mobileMenuContent = $('.mobile-menu-content');
    const $mobileMenuClose = $('.mobile-menu-close');

    // Mobile menu functions
    function openMobileMenu() {
        $mobileMenu.removeClass('hidden');
        setTimeout(() => $mobileMenuContent.removeClass('translate-x-full'), 10);
        $body.css('overflow', 'hidden');
    }

    function closeMobileMenu() {
        $mobileMenuContent.addClass('translate-x-full');
        setTimeout(() => $mobileMenu.addClass('hidden'), 300);
        $body.css('overflow', '');
    }

    // Event bindings
    $mobileMenuBtn.on('click', openMobileMenu);
    $mobileMenuClose.on('click', closeMobileMenu);

    $mobileMenu.on('click', function (e) {
        if (e.target === this) closeMobileMenu();
    });

    $(document).on('keydown', function (e) {
        if (e.key === 'Escape' && !$mobileMenu.hasClass('hidden')) closeMobileMenu();
    });

    // Responsive: close menu on desktop
    $(window).on('resize', function () {
        if (window.innerWidth >= 1024) closeMobileMenu();
    });
});
