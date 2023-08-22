(function ($) {
    $(() => {
        const informationCard = $('.js-information-card');

        if (!informationCard.length) {
            return;
        }

        const hoverContent = $('.js-information-card-hover-content');

        informationCard.hover(function (e) {
            e.preventDefault();
            hoverContent.removeClass('is-visible');
            $(this).next(hoverContent).addClass('is-visible');

            $(this).next(hoverContent).mouseleave(function(){
                $(this).removeClass('is-visible');
            });
        });
    });
})(jQuery);
