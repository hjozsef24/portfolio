(function ($) {
    $(function () {
        const dateFilter = $('.js-program-date-filter');

        if(!dateFilter.length){
            return;
        }

        /* Create the variables and arrays */
        const programCard = $('.js-program-card');
        const modal = $('.js-program-filter-modal');
        const searchInput = $('.js-program-search');
        const pill = $('.js-program-date-filter-pill');
        const filterAgeCheckbox = $('.js-checkbox-age');
        const filterTypeCheckbox = $('.js-checkbox-type');
        const defaultDate = dateFilter.first().data('date');
        const currentProgramsCheckbox = $('.js-checkbox-current');
        const programCardContent = $('.js-program-card:visible .js-search-title');

        var selectedAges = [];
        var selectedTypes = [];

        /* Function for initialize the pill under the selected date */
        function initPill(){
            dateFilter.first().addClass('selected');
            pill.css('left', "8px");
            return;
        }

        /* Function for animate the pill for the selected date */
        function animatePill(selectedId){
            var width = selectedId == 0 ? "8px" : selectedId * 33 + "%";
            dateFilter.removeClass('selected');
            $('.js-program-date-filter[data-id =' + selectedId + ']').addClass('selected')
            pill.css('left', width);

            if($(window).width() <= 425 && selectedId == 2){
                pill.css('left', 'calc(66% - 8px)');
            }
            return;
        }

        /* Function for count the filtered items */
        function countVisibleItems(){
            var visibleItems = programCard.not(':hidden').length;
            $('.js-filtered-programs-counter').html(visibleItems);
        }

        /* Function to compare arrays, returns boolean */
        function arraysHasCommonValues(first_array, second_array){
            return first_array.filter(e => second_array.includes(e)).length > 0;
        }

        /* Function to load programs by date */
        function loadProgramsByDate(selectedDate){
            programCard.each(function(){
                $(this).removeClass('filtered-by-date');
                var programCardDates = $(this).attr('data-program-times');
                if(programCardDates.includes(selectedDate)){
                    $(this).addClass('filtered-by-date').parent().show()
                } else {
                    $(this).parent().hide()   
                }
                return;
            })
        }

        /* Function to load programs by age */
        function loadProgramsByAge(ageId = null){
            if(ageId != null){
                ageId = parseInt(ageId);
                if(!selectedAges.includes(ageId)){
                    selectedAges.push(ageId);
                } else {
                    selectedAges = selectedAges.filter(e => e !=ageId);
                }
            }

            programCard.each(function(){
                var programCardAges = $(this).attr('data-program-ages');
                $(this).removeClass('filtered-by-age');
                if($('.filtered-by-type').length > 0){
                    if(arraysHasCommonValues(JSON.parse(programCardAges), selectedAges) && $(this).hasClass('filtered-by-date') && $(this).hasClass('filtered-by-type')){
                        $(this).addClass('filtered-by-age').parent().show();
                    } else {
                        $(this).parent().hide();
                    }
                } else if (arraysHasCommonValues(JSON.parse(programCardAges), selectedAges) && $(this).hasClass('filtered-by-date')) {
                    $(this).addClass('filtered-by-age').parent().show();
                } else {
                    $(this).parent().hide();
                }
            });
            return;
        }

        /* Function to load programs by type */
        function loadProgramsByType(typeId = null){
            if(typeId != null){
                typeId = parseInt(typeId);
                if(!selectedTypes.includes(typeId)){
                    selectedTypes.push(typeId);
                } else {
                    selectedTypes = selectedTypes.filter(e => e != typeId);
                }
            }

            programCard.each(function(){
                var programCardTypes = $(this).attr('data-program-types');
                $(this).removeClass('filtered-by-type');
                if($('.filtered-by-age').length > 0){
                    if(arraysHasCommonValues(JSON.parse(programCardTypes), selectedTypes) && $(this).hasClass('filtered-by-date') && $(this).hasClass('filtered-by-age')){
                        $(this).addClass('filtered-by-type').parent().show();
                    } else {
                        $(this).parent().hide();
                    }
                } else if(arraysHasCommonValues(JSON.parse(programCardTypes), selectedTypes) && $(this).hasClass('filtered-by-date')) {
                    $(this).addClass('filtered-by-type').parent().show();
                } else {
                    $(this).parent().hide();
                }
            });
            return;
        }

        /* Function to load programs by searched keyword */
        function loadProgramsByKeyword(){
            const search = searchInput.val().toLowerCase().trim();

            programCardContent.each(function() {
                const title = $(this).text().toLowerCase();
                if (title.includes(search) && $(this).closest('.js-program-card').hasClass('filtered-by-date')) {
                    if(($('.filtered-by-type').length > 0 || $('.filtered-by-age').length > 0)){
                        if($(this).closest('.js-program-card').hasClass('filtered-by-type') || $(this).closest('.js-program-card').hasClass('filtered-by-age')){
                            $(this).closest('.js-program-card').addClass('filtered-by-keyword').parent().show();
                        } else {
                            $(this).closest('.js-program-card').removeClass('filtered-by-keyword').parent().hide();
                        }
                    } else {
                        $(this).closest('.js-program-card').addClass('filtered-by-keyword').parent().show();
                    }
                } else {
                    $(this).closest('.js-program-card').parent().hide();
                }
            });

        }

        function loadCurrentPrograms(){
            const date = Math.floor(Date.now() / 1000);
            programCard.each(function() {
                var programTimestamps = $(this).data('timestamp');
                programTimestamps.map(e => {
                    if(e.start <= date && e.end >= date){
                        if ($(this).hasClass('filtered-by-date')) {
                            if(($('.filtered-by-type').length > 0 || $('.filtered-by-age').length > 0)) {
                                if($(this).hasClass('filtered-by-type') || $(this).hasClass('filtered-by-age')){
                                    $(this).closest('.js-program-card').addClass('filtered-by-keyword').parent().show();
                                } else {
                                    $(this).closest('.js-program-card').removeClass('filtered-by-keyword').parent().hide();
                                }
                            } else {
                                $(this).closest('.js-program-card').addClass('filtered-by-keyword').parent().show();
                            }
                        } else {
                            $(this).closest('.js-program-card').parent().hide();
                        }
                    }
                });
            });
        }

        /* Event for filter by date */
        dateFilter.on('click', function(e){
            e.preventDefault();
            var selectedId = $(this).data('id');
            var selectedDate = $(this).data('date');
            animatePill(selectedId);
            loadProgramsByDate(selectedDate);

            if(selectedAges.length > 0){
                loadProgramsByAge(null);
            }

            if(selectedTypes.length > 0){
                loadProgramsByType(null);
            }

            loadProgramsByKeyword();
            countVisibleItems();
        });

        /* Event for filter by age */
        filterAgeCheckbox.on('click', function(){
            var ageId = $(this).val();
            loadProgramsByAge(ageId);

            if(selectedAges.length == 0){
                var currentDate = $('.js-program-date-filter.selected').data('date')
                loadProgramsByDate(currentDate);

                if(selectedTypes.length > 0){
                    loadProgramsByType(null);
                }
            }

            loadProgramsByKeyword();
            countVisibleItems();
        });

        /* Event for filter by type */
        filterTypeCheckbox.on('click', function(){
            var typeId = $(this).val();
            loadProgramsByType(typeId);

            if(selectedTypes.length == 0){
                var currentDate = $('.js-program-date-filter.selected').data('date')
                loadProgramsByDate(currentDate);

                if(selectedAges.length > 0){
                    loadProgramsByAge(null);
                }
            }
            
            loadProgramsByKeyword();
            countVisibleItems();
        });

        /* Event for filter by search keyword */
        searchInput.on('input keyup paste', function() {
            loadProgramsByKeyword();
            countVisibleItems();
        });

        currentProgramsCheckbox.on('click', function(){
            loadCurrentPrograms();
        })

        /* Init default program filter status */
        initPill(defaultDate);
        loadProgramsByDate(defaultDate);
        countVisibleItems();

        /* Responsive modal events */
        $('.js-init-program-filter-modal').on('click', function(e){
            modal.addClass('is-active')
        });

        $('.js-close-program-filter-modal, .js-checkbox-filter-show-programs').on('click', function(e){
            modal.removeClass('is-active')
        });

        $('.js-checkbox-filter-accordion').on('click', function(e){
            $(this).next('.js-checkbox-filter').toggleClass('is-visible');
        });

    });
})(jQuery);