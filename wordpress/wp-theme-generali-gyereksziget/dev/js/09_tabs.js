(function ($) {
    $(function () {
        const tabFilter = $('.js-tab-filter');

        if(!tabFilter.length){
            return;
        }

        const tabPill = $('.js-tab-filter-pill');

        function initTabsPill(){
            tabFilter.first().addClass('selected');
            tabPill.css('left', "8px");
            return;
        }

        function animateTabsPill(selectedId){
            var width = selectedId == 0 ? "8px" : selectedId * 50 + "%";
            tabFilter.removeClass('selected');
            $('.js-tab-filter[data-id =' + selectedId + ']').addClass('selected')
            tabPill.css('left', width);
            return;
        }

        tabFilter.on('click', function(e){
            e.preventDefault();
            var selectedId = $(this).data('id');
            $('.js-tab-content').hide();
            $('.js-tab-content[data-id =' + selectedId + ']').show()
            animateTabsPill(selectedId);
        });

        $('.js-tab-content').not(":first").hide();
        initTabsPill();
    });
})(jQuery);