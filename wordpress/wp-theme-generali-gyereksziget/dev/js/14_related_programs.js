(function ($) {
    $(function () {    
        const relatedProgramsFilter = $('.js-related-program-filter');

        if(!relatedProgramsFilter.length){
            return;
        }

        const relatedProgramPill = $('.js-related-program-filter-pill');

        function initRelatedProgramsPill(){
            relatedProgramsFilter.first().addClass('selected');
            relatedProgramPill.css('left', "8px");
            return;
        }

        function animateRelatedProgramsPill(selectedId){
            var width = selectedId == 0 ? "8px" : selectedId * 33 + "%";
            relatedProgramsFilter.removeClass('selected');
            $('.js-related-program-filter[data-id =' + selectedId + ']').addClass('selected')
            relatedProgramPill.css('left', width);
            return;
        }

        relatedProgramsFilter.on('click', function(e){
            e.preventDefault();
            var selectedId = $(this).data('id');
            $('.js-related-programs-content').hide();
            $('.js-related-programs-content[data-id =' + selectedId + ']').show()
            animateRelatedProgramsPill(selectedId);
        });

        $('.js-related-programs-content').not(":first").hide();
        initRelatedProgramsPill();

    });
})(jQuery);