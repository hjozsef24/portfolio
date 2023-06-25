(function ($) {
    $(document).on('click', '.theatre', function () {
        $('.infowindow').addClass('infowindow-active');
        $('.page-content').addClass('infowindow-overlay')
    });


    $("a").on('click', function () {
        $('.infowindow').removeClass('infowindow-active');
        $('.page-content').removeClass('infowindow-overlay')
    });

    $('.js-close-infowindow').on('click', function () {
        $('.infowindow').removeClass('infowindow-active');
        $('.page-content').removeClass('infowindow-overlay')
    });

    $(document).mouseup(function (e) {
        var container = $(".infowindow");

        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.infowindow').removeClass('infowindow-active');
            $('.page-content').removeClass('infowindow-overlay');
        }
    });

    if ($(window).width() > 991) {
        $('.infowindow').on('scroll', function () {
            if ($('.infowindow').scrollTop() > 0) {
                $('.x').css({
                    "fill" : "white",
                    "background-color" : "#bc9137",
                    "position" : "sticky"
                });
            } else {
                $('.x').css({
                    "fill": "",
                    "background-color": ""
                })
            }
        })
    } else{
        $('.js-close-infowindow').css("position", "absolute")
    }

})(jQuery)