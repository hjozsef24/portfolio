(function($) {
    'use strict';
    $(function() {
        const searchForm = $('.js-search-places-form')

        if (!searchForm.length) {
            return;
        }

        const input = $('.js-live-search');
        const places = $('.js-search-title');

        input.on('keypress', function(e) {
            return e.which !== 13;
        });

        input.on('input keyup paste', function() {
            const search = input
                .val()
                .toLowerCase()
                .trim();

            places.each(function() {
                const title = $(this)
                    .text()
                    .toLowerCase();
                if (title.includes(search)) {
                    $(this).closest('.js-places').show();
                } else {
                    $(this).closest('.js-places').hide();
                }
            });
        });
    });
})(jQuery);
