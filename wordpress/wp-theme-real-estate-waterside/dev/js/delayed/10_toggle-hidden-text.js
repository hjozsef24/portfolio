(function ($) {
    $(() => {
        const textToggle = $('.js-toggle-hidden-text');

        if (!textToggle.length) {
            return;
        }

        const hiddenText = $('.js-hidden-text');

        textToggle.on('click', (e) => {
            e.preventDefault();
            
            hiddenText.toggle();

            if(hiddenText.is(':visible')){
                textToggle.text(localize.translations.read_less);
            } else {
                textToggle.text(localize.translations.read_more)
            }

        });
    });
})(jQuery);
