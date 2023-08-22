(function ($) {
    $(() => {
        const imageToSwitch = $('.js-image-to-switch');

        if(!imageToSwitch.length){
            return;
        }
        
        const toggleImages = $('.js-image-toggle');
        const switcherIcon = $('.js-switcher-icon')


        toggleImages.on('click', function(e){
            e.preventDefault();
            imageToSwitch.toggleClass('is-image-switched');
            switcherIcon.toggleClass('is-toggled')
        });
    });
})(jQuery);
