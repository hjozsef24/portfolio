(function ($) {
    $(() => {
        const toggleMobileMenu = $('.js-toggle-mobile-menu');

        if (!toggleMobileMenu.length) {
            return;
        }

        const header = $('header');
        const htmlBody = $('html, body');
        const mobileMenu = $('.js-mobile-menu');
        const logoImage = $('.js-header-logo');
        const logoDefault = localize.header_assets.logo_default;
        const logoScrolled = localize.header_assets.logo_scrolled;

        toggleMobileMenu.on('click', (e) => {
            e.preventDefault();
            toggleMobileMenu.add(mobileMenu).toggleClass('is-active');
            htmlBody.toggleClass('overflow-hidden');
            header.toggleClass('has-extra-background');

            if (header.hasClass('has-extra-background')) {
                logoImage.fadeOut('fast', function () {
                    $(this).attr('src', logoScrolled);
                    $(this).fadeIn('fast');
                });
            } else {
                logoImage.fadeOut('fast', function () {
                    $(this).attr('src', logoDefault);
                    $(this).fadeIn('fast');
                });
            }
        });
    });
})(jQuery);
