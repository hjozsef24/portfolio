import $ from 'jquery';
import 'slick-carousel';

const movieSlider = () => {

    $('.js-movie-list-slider').not('.slick-initialized').each(function () {
        const $this = $(this);

        $this.slick({
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            draggable: false,
            swipeToSlide: true,
            prevArrow: $this.parent().children('.js-movie-slider-arrow-left'),
            nextArrow: $this.parent().children('.js-movie-slider-arrow-right'),
            infinite: false,
            autoplay: false,
            mobileFirst: true,
            responsive: [
                {
                  breakpoint: 1799,
                  settings: {
                    slidesToShow: 5.5,
                  },
                },
                {
                  breakpoint: 1399,
                  settings: {
                    slidesToShow: 4.5,
                  },
                }, 
                {
                  breakpoint: 1199,
                  settings: {
                    slidesToShow: 3.5,
                  },
                },  
                {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 2.5,
                  },
                }, 
                {
                  breakpoint: 300,
                  settings: {
                    slidesToShow: 1.5,
                  },
                }, 
                
                // {
                //   breakpoint: 1299,
                //   settings: {
                //     slidesToShow: 3.5,
                //   },
                // },
              ],
        })
            .on('init', function (event, slick) {
                $this.parent().children('.js-movie-slider-arrow-left').hide();
            });
    });
};

export default movieSlider;