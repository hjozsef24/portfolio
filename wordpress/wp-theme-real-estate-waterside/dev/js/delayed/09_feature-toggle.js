(function ($) {
    $(() => {
        const featureToggle = $('.js-feature-toggle');

        if (!featureToggle.length) {
            return;
        }

        const featureTitle = $('.js-feature-toggle-title');

        featureToggle.on('click', (e) => {
            e.preventDefault();
            featureToggle.toggleClass('is-switched');
            featureTitle.toggleClass('is-active');

            $('.js-feature-card.is-basic').each(function(){
                $(this).toggleClass('is-hidden')
            })
        });
    });
})(jQuery);
