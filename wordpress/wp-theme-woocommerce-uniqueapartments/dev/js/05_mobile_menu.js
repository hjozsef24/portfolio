(function ($) {
    'use strict';
    $(function () {
        $('.js-toggle-mobile-menu').on('click', function () {
            $('.js-toggle-mobile-menu, .js-mobile-menu').toggleClass('is-active');
            $('html').toggleClass('mobile-menu-opened');
        });
    });
})(jQuery);