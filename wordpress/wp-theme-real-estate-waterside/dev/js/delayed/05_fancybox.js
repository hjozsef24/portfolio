(function ($) {
    $(() => {
        Fancybox.bind('[data-fancybox]', {
            Toolbar: {
                display: {
                    left: ['infobar'],
                    middle: [
                        'zoomIn',
                        'zoomOut',
                        'toggle1to1',
                        'rotateCCW',
                        'rotateCW',
                        'flipX',
                        'flipY',
                    ],
                    right: ['slideshow', 'download', 'thumbs', 'close'],
                },
            },
        });
    });
})(jQuery);
