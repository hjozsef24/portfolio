import $ from 'jquery';
import 'slick-carousel';

const heroSlider = () => {
    $('.js-hero-slider').not('.slick-initialized').each(function () {
        const $this = $(this);
        const $decor = $('.js-hero-decor');
        const $nextArrow = $this.next().children('.js-hero-next-arrow');
        const $prevArrow = $this.next().children('.js-hero-previous-arrow');
        let changedTimes = 0;

        $this.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1000,
            prevArrow: $prevArrow,
            nextArrow: $nextArrow,
        }).on("beforeChange", function () {
            changedTimes++;
            if (changedTimes === 1) {
                $decor.addClass('second-stage');
            } else if (changedTimes === 2) {
                $decor.addClass('third-stage');
            } else if (changedTimes === 3) {
                $decor.removeClass('third-stage second-stage');
                changedTimes = 0;
            }
        });
    });
};

export default heroSlider;