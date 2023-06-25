(function($) {
    $(function() {
        const loadMoreButton = $('.js-load-more-news');

        if(!loadMoreButton.length){
            return;
        }

        loadMoreButton.on('click', function(e){
            e.preventDefault()

            const offset = $('.js-program-card').length;

            $.ajax({
                url: localize.ajaxurl,
                type: "POST",
                data: {
                    action: "load_more_news",
                    data: offset
                },
                error: function (error) {
                  console.log(error)
                },
                success: function (response) {
                    if(response == 0){
                        loadMoreButton.hide();
                        return;
                    }
                    $('.js-load-more-news-container').append(response);
                },
            });
        });
    });
})(jQuery);