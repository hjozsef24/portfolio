(function ($) {
    $(() => {
        const modal = $('.js-request-offer-modal');

        if (!modal.length) {
            return;
        }

        const openModal = $('.js-open-request-modal');
        const closeModal = $('.js-close-request-modal');

        openModal.on('click', (e) => {
            e.preventDefault();
            $('html, body').addClass('overflow-hidden');
            $('body').addClass('has-overlay');
            modal.addClass('is-visible');
        });

        closeModal.on('click', (e) => {
            e.preventDefault();
            $('html, body').removeClass('overflow-hidden');
            $('body').removeClass('has-overlay');
            modal.removeClass('is-visible');
        });
    });
})(jQuery);
