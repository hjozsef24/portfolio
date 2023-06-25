(function($) {
    $(function() {
        //Function to add match height for any block
        $.addMatchHeight = function addMatchHeight(card) {
            if ($(window).width() < 768) {
                if (card.data('matchHeight') === 'true') {
                    card.data('matchHeight', 'false');
                    card.matchHeight({
                        remove: true
                    });
                }
            } else {
                if (
                    card.data('matchHeight') === 'false' ||
                    typeof card.data('matchHeight') === 'undefined'
                ) {
                    card.data('matchHeight', 'true');
                    card.matchHeight({
                        byRow: true
                    });
                }
            }
        };

        //Match Heights
        $.addMatchHeight($('.js-service-title'));
        $.addMatchHeight($('.js-program-card'));
        $.addMatchHeight($('.js-text-block'));
        $.addMatchHeight($('.js-service-excerpt'));
        $.addMatchHeight($('.js-program-excerpt'));
        $.addMatchHeight($('.js-program-text-wrapper'));

        // Function to copy to clipboard
        function copyToClipboard(element) {
            var $temp = $('<input>');
            $('body').append($temp);
            $temp.val(element).select();
            document.execCommand('copy');
            $temp.remove();
        }

        $('.js-copy-link').on('click', function(e) {
            e.preventDefault();
            copyToClipboard(document.location.href);
        });


        //Go back to previous page
        $('.js-go-back').on('click', function(e) {
            e.preventDefault();
            history.back();
        });
    });
})(jQuery);
