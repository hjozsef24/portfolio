(function ($) {
    $(function () {
        const galleryFilter = $('.js-gallery-filter');

        if(!galleryFilter.length){
            return;
        }

        const galleryPill = $('.js-gallery-filter-pill');

        function initTabsPill(){
            galleryFilter.first().addClass('selected');
            galleryPill.css('left', "8px");
            return;
        }

        function animateTabsPill(selectedId){
            var width = selectedId == 0 ? "8px" : selectedId * 33 + "%";
            galleryFilter.removeClass('selected');
            $('.js-gallery-filter[data-id =' + selectedId + ']').addClass('selected')  
            galleryPill.css('left', width);

            if($(window).width() <= 425 && selectedId == 2){
                galleryPill.css('left', 'calc(66% - 8px)');
            }
            return;
        }

        galleryFilter.on('click', function(e){
            e.preventDefault();
            var selectedId = $(this).data('id');
            $('.js-gallery-content').hide();
            $('.js-gallery-content[data-id =' + selectedId + ']').show()
            animateTabsPill(selectedId);
        });

        $('.js-gallery-content').not(":first").hide();
        initTabsPill();
    });
})(jQuery);