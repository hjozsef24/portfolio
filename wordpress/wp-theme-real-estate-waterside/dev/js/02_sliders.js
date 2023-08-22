(function ($) {
    $(() => {
        const panoramaSlider = $('.js-panorama-slider');
        panoramaSlider.slick({
            mobileFirst: true,
            slidesToScroll: 1,
            infinite: false,
            dots: false,
            arrows: false,
            responsive: [
                {
                    breakpoint: 300,
                    settings: {
                        slidesToShow: 1.4,
                    },
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 3.2,
                    },
                },
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 4,
                    },
                },
            ],
        });

        $("div[class^='js-apartment-card-gallery-']").each(function (e) {
            $(this).slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                arrows: true,
                prevArrow: $(this).nextAll('.js-apartment-gallery-prev'),
                nextArrow: $(this).nextAll('.js-apartment-gallery-next'),
            });
        });

        const simpleSlider = $('.js-simple-slider');
        simpleSlider.slick({
            slidesToScroll: 1,
            infinite: false,
            prevArrow: $('.js-simple-slider-prev'),
            nextArrow: $('.js-simple-slider-next'),
            dots: true,
            mobileFirst: true,
            appendDots: $('.js-simple-slider-dots'),
            responsive: [
                {
                    breakpoint: 300,
                    settings: {
                        slidesToShow: 1,
                    },
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1.6,
                    },
                },
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 2.5,
                    },
                },
            ],
        });

        $("div[class^='js-slider-text-image-images-']").each(function (i, e) {
            $(this).slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                arrows: false,
                dots: false,
                asNavFor: $(`.js-slider-text-image-texts-${i}`),
            });
        });

        $("div[class^='js-slider-text-image-texts-']").each(function (i, e) {
            $(this)
                .on('init', (slick) => {
                    if (slick.slideCount > 1) {
                        $(this)
                            .next('.text-image-slider__navigation')
                            .children()
                            .children('.js-text-image-slider-all')
                            .text(slick.slideCount);
                    }
                })
                .slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    prevArrow: $(this)
                        .next('.text-image-slider__navigation')
                        .children('.js-text-image-slider-prev'),
                    nextArrow: $(this)
                        .next('.text-image-slider__navigation')
                        .children('.js-text-image-slider-next'),
                    dots: false,
                    asNavFor: $(`.js-slider-text-image-images-${i}`),
                })
                .on('beforeChange', (slick, nextSlide) => {
                    if (slick.slideCount > 1) {
                        $(this)
                            .next('.text-image-slider__navigation')
                            .children()
                            .children('.js-text-image-slider-counter')
                            .text(slick.slideCount)
                            .text(nextSlide + 1);
                    }
                });
        });

        const otherPublicationsSlider = $('.js-other-publications-slider');
        otherPublicationsSlider.slick({
            slidesToScroll: 1,
            infinite: false,
            mobileFirst: true,
            arrows: false,
            dots: false,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2.1,
                    },
                },
                {
                    breakpoint: 300,
                    settings: {
                        slidesToShow: 1.1,
                    },
                },
            ],
        });
    });
})(jQuery);
