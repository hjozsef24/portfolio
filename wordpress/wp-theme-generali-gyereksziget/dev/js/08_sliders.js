(function ($) {
    $(function () {
        const heroSlider = $('.js-hero-slider');

        heroSlider.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            prevArrow: false,
            nextArrow: false,
            dots: true,
            infinite: true
        });

        const sponsorsSlider = $('.js-sponsors-slider');

        sponsorsSlider.on('init', function () {
            sponsorsSlider.removeClass('slick-hider')
        });

        sponsorsSlider.slick({
            slidesToShow: 8,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            prevArrow: false,
            nextArrow: false,
            dots: true,
            infinite: true,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 6,
                        rows: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        rows: 2
                    }
                },
            ] 
        });

        const quotesSlider = $('.js-quotes-slider');

        quotesSlider.slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            prevArrow: false,
            nextArrow: false,
            dots: true,
            infinite: false,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1.5,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 499,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]       
        });
        
        const relatedProgramsSlider = $('.js-related-programs-slider');

        relatedProgramsSlider.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            prevArrow: false,
            nextArrow: false,
            dots: true,
            infinite: false,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 3,
                        rows: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1.1,
                    }
                },
            ] 
        });

        const highlightedPlacesSlider = $('.js-highlighted-places-slider');

        highlightedPlacesSlider.slick({
            slidesToShow: 1.1,
            mobileFirst: true, 
            responsive: [
                {
                    breakpoint: 767,
                    settings: "unslick"
                }
            ],
            infinite: false,
            prevArrow: false,
            nextArrow: false,
            dots: true,
        })

        const highlightedNewsSlider = $('.js-highlighted-news-slider');

        highlightedNewsSlider.slick({
            mobileFirst: true, 
            responsive: [
                {
                    breakpoint: 1199,
                    settings: "unslick"
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 300,
                    settings: {
                        slidesToShow: 1.1,
                    }
                }
            ],
            infinite: false,
            prevArrow: false,
            nextArrow: false,
            dots: true,
        });

        const relatedNewsSlider = $('.js-related-news-slider');
        
        relatedNewsSlider.slick({
            mobileFirst: true, 
            responsive: [
                {
                    breakpoint: 992,
                    settings: "unslick"
                },
                {
                    breakpoint: 545,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 300,
                    settings: {
                        slidesToShow: 1.1,
                    }
                }
            ],
            infinite: false,
            prevArrow: false,
            nextArrow: false,
            dots: true,
        });
    });
})(jQuery);