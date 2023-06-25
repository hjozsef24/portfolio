(function ($) {
    'use strict';
    $(function () {
        //Dropdown menu
        var dropdownContainer = $('.dropdown-menu');

        $('.dropdown-toggle').on('click', function(e){
            if(!$(this).next(dropdownContainer).hasClass('active')){
                e.preventDefault();
                $(this).parent().addClass('is-toggled');
                $(this).next(dropdownContainer).addClass('active');
            }
        })

        $(document).mouseup(function(e) {
            if(!$(e.target).hasClass('dropdown-toggle') && !$(e.target).hasClass('active')){
                if(dropdownContainer.hasClass('active') && !dropdownContainer.is(e.target) && dropdownContainer.has(e.target).length === 0){
                    dropdownContainer.parent().removeClass('is-toggled');
                    dropdownContainer.removeClass('active');
                }
            }
        });

        //Hamburger menu
        $('.js-toggle-mobile-menu').on('click', function () {
            $('.js-toggle-mobile-menu, .js-mobile-menu').toggleClass('is-active');
            $('body').toggleClass('body--fixed');
        });
    });
})(jQuery);
