(function ($) {
  $(function () {
    var mainSlider = $(".js-slider");

    mainSlider.slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      autoplay: true,
    });

    var productThumbnailGallerySlider = $(".js-product-thumbnail-gallery");

    productThumbnailGallerySlider.slick({
      infinite: true,
      slidesToShow: 5,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      asNavFor: productImageSlider,
      focusOnSelect: true,
      mobileFirst: true,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 5,
          },
        },
        {
          breakpoint: 300,
          settings: {
            slidesToShow: 3,
          },
        },
      ],
    });

    var productImageSlider = $(".js-product-image-gallery");

    productImageSlider.slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      asNavFor: productThumbnailGallerySlider,
      focusOnSelect: true,
    });

    var gallerySlider = $(".js-gallery-paginable");
    var gallerySliderPrevArrow = $(".js-gallery-paginable-prev");
    var gallerySliderNextArrow = $(".js-gallery-paginable-next");

    gallerySlider.slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      arrows: true,
      prevArrow: gallerySliderPrevArrow,
      nextArrow: gallerySliderNextArrow,
      autoplay: true,
    });

    $("div[class^='js-gallery-paginable-']").each(function (e) {
      $(this).slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        prevArrow: $(this).prev(gallerySliderPrevArrow),
        nextArrow: $(this).next(gallerySliderNextArrow),
      });

      $(gallerySliderPrevArrow)
        .add(gallerySliderNextArrow)
        .on("click", function (e) {
          e.preventDefault();
        });
    });

    var highlightedDevelopmentsSlider = $(
      ".js-highlighted-developments-slider"
    );

    highlightedDevelopmentsSlider.slick({
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      mobileFirst: true,
      infinite: false,
      responsive: [
        {
          breakpoint: 576,
          settings: "unslick",
        },
        {
          breakpoint: 300,
          settings: {
            slidesToShow: 1.1,
          },
        },
      ],
    });

    var highlightedFurniturePackagesSlider = $(
      ".js-highlighted-furniture-packages-slider"
    );

    highlightedFurniturePackagesSlider.slick({
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      mobileFirst: true,
      infinite: false,
      responsive: [
        {
          breakpoint: 576,
          settings: "unslick",
        },
        {
          breakpoint: 300,
          settings: {
            slidesToShow: 1.1,
          },
        },
      ],
    });

    var productsInGroupSlider = $(".js-products-in-group-slider");

    productsInGroupSlider.slick({
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      mobileFirst: true,
      infinite: false,
      responsive: [
        {
          breakpoint: 576,
          settings: "unslick",
        },
        {
          breakpoint: 300,
          settings: {
            slidesToShow: 1.1,
          },
        },
      ],
    });

    var upsellsProductSlider = $(".js-upsells-product-slider");

    upsellsProductSlider.slick({
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      mobileFirst: true,
      infinite: false,
      responsive: [
        {
          breakpoint: 576,
          settings: "unslick",
        },
        {
          breakpoint: 300,
          settings: {
            slidesToShow: 1.1,
          },
        },
      ],
    });

    var similarProductSlider = $(".js-similar-product-slider");

    similarProductSlider.slick({
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      mobileFirst: true,
      infinite: false,
      responsive: [
        {
          breakpoint: 576,
          settings: "unslick",
        },
        {
          breakpoint: 300,
          settings: {
            slidesToShow: 1.1,
          },
        },
      ],
    });

    var relatedApartmentsSlider = $(".js-related-apartments-slider");

    relatedApartmentsSlider.slick({
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      mobileFirst: true,
      infinite: false,
      responsive: [
        {
          breakpoint: 767,
          settings: "unslick",
        },
        {
          breakpoint: 300,
          settings: {
            slidesToShow: 1.1,
          },
        },
      ],
    });

    var apartmentsGallerySlider = $(".js-apartments-gallery-slider");

    apartmentsGallerySlider.slick({
      slidesToScroll: 1,
      slidesToShow: 1,
      dots: true,
      arrows: false,
      mobileFirst: true,
      infinite: false,
      responsive: [
        {
          breakpoint: 767,
          settings: "unslick",
        },
        {
          breakpoint: 300,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });

    var productsInPackageSlider = $(".js-products-in-package-slider");

    productsInPackageSlider.slick({
      slidesToScroll: 1,
      slidesToShow: 1,
      dots: true,
      arrows: false,
      mobileFirst: true,
      infinite: false,
      responsive: [
        {
          breakpoint: 767,
          settings: "unslick",
        },
        {
          breakpoint: 300,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });

    var referencesSlider = $(".js-references-slider");

    referencesSlider.slick({
      slidesToScroll: 1,
      slidesToShow: 1,
      dots: true,
      arrows: false,
      mobileFirst: true,
      infinite: false,
      responsive: [
        {
          breakpoint: 767,
          settings: "unslick",
        },
        {
          breakpoint: 300,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });

    var mobileGallerySlider = $('.js-gallery-mobil-slider');

    mobileGallerySlider.slick({
      slidesToScroll: 1,
      slidesToShow: 1,
      dots: true,
      arrows: false,
      mobileFirst: true,
      infinite: false,
      responsive: [
        {
          breakpoint: 767,
          settings: "unslick",
        },
        {
          breakpoint: 300,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
  });
})(jQuery);
