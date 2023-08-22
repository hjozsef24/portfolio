(function ($) {
    $(() => {
        const toggle = $('.js-share');

        if (!toggle.length) {
            return;
        }

        toggle.on('click', function (e) {
            e.preventDefault();
            $(this).parents('.js-apartment-card-footer').next('.js-share-modal').toggleClass('is-active');
        });
    });
})(jQuery);
