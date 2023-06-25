(function ($) {

    var swiper_images = new Swiper('.swiper-images', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        direction: 'horizontal',
        grabCursor: false,
        centeredSlides: false,
        allowTouchMove: false,
    });


    var swiper_text = new Swiper('.swiper-text', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        direction: 'horizontal',
        grabCursor: false,
        effect: 'fade',
        fadeEffect: {
            crossFade: true,
        },
        allowTouchMove: false,
        controller: {
            control: swiper_images,
        },
        navigation: {
            nextEl: '.swiper-arrow-right',
            prevEl: '.swiper-arrow-left',
        },
    });

})(jQuery)