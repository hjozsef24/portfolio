(function ($) {
    $(() => {
        const dropdownToggle = $('.js-dropdown-toggle');

        if (!dropdownToggle.length) {
            return;
        }

        const dropdown = $('.js-selector-dropdown');

        dropdownToggle.on('click', function (e) {
            $(this).toggleClass('is-active');
            $(this).children(dropdown).toggleClass('is-visible');
        });
    });
})(jQuery);
