(function ($) {
    $(function () {        
        const map = document.querySelector('#js-filterable-map');

        if(map == null){
            return;
        }

        //Default variables
        var selectedAges = [];
        var selectedTypes = [];

        const places = localize.map_data;
        const pins = $('.js-map-location');
        const infoBox = $('.js-map-infobox');
        const keywordInput = $('.js-live-search');
        const listItemTitle = $('.js-place-name');
        const modal = $('.js-program-filter-modal');

        //Create the draggable map effect on the SVG
        var instance =  panzoom(map, {
          bounds: true,
          beforeWheel: function(e) {
              var shouldIgnore = !e.altKey;
              return shouldIgnore;
          },
          maxZoom: 5,
          minZoom: 1,
          boundsPadding: 0.4,
          onTouch: function(e) {
            if($(e.target).parent().parent().hasClass('js-map-location')) {
              return false;
            } 

            e.preventDefault();
        },
      });

      instance.on('transform', function(e) {
         $('.js-map-infobox .js-map-list-item').remove();
      });

        //Option to zoom in the SVG
        Array.from(
          document.querySelectorAll('.js-map-zoom-button')
        ).forEach(attachClickHandler)
      
        function attachClickHandler(el) {
          el.addEventListener('click', handleClick);
        }
    
        function handleClick(e) {
          e.preventDefault();
          let cx = $(window).width() / 2;
          let cy = $(window).height() / 2;
          let isZoomIn = e.target.id === 'zoomIn';
          let zoomBy = isZoomIn ? 2 : 0.5;
          instance.smoothZoom(cx, cy, zoomBy);
        }

        //Function to filter places by age category
        function filterPlacesByAge(ageId = null){
          pins.add(infoBox).hide().removeClass('filtered-by-age');
          if(ageId != null){
            if(!selectedAges.includes(ageId)){
                selectedAges.push(ageId);
            } else {
                selectedAges = selectedAges.filter(e => e != ageId);
            }
          }

          places.map(function(place){
            var place_id = place.place_id;
            var programs = place.programs;

            programs.map(function(program){
              var programAgeId = program.age_id.toString();

              if($('.filtered-by-type').length > 0){
                if(selectedAges.includes(programAgeId) && $(document).find(`g#${place_id}`).hasClass('filtered-by-type')){
                  $(document).find(`g#${place_id}`).show().addClass('filtered-by-age');
                }
              } else {
                if(selectedAges.includes(programAgeId)){
                  $(document).find(`g#${place_id}`).show().addClass('filtered-by-age');
                }
              }
            })
          });

          if(!selectedAges.length > 0){
            $(document).find('g').show();
          }
        }

        //Function to filter places by type category
        function filterPlacesByType(typeId = null){
          pins.add(infoBox).hide().removeClass('filtered-by-type');
          if(typeId != null){
            if(!selectedTypes.includes(typeId)){
              selectedTypes.push(typeId);
            } else {
              selectedTypes = selectedTypes.filter(e => e != typeId);
            }
          }

          places.map(function(place){
            var place_id = place.place_id;
            var programs = place.programs;

            programs.map(function(program){
              var programTypeId = program.type_id.toString();

              if($('.filtered-by-age').length > 0){
                if(selectedTypes.includes(programTypeId) && $(document).find(`g#${place_id}`).hasClass('filtered-by-age')){
                  $(document).find(`g#${place_id}`).show().addClass('filtered-by-type');
                }
              } else{
                if(selectedTypes.includes(programTypeId)){
                  $(document).find(`g#${place_id}`).show().addClass('filtered-by-type');
                }
              }
            })
          });

          if(!selectedTypes.length > 0){
            $(document).find('g').show();
          }
        }

        //Function to filter places by keyword
        function filterByKeyword(inputValue){

          pins.add(infoBox).hide().removeClass('filtered-by-keyword');

          listItemTitle.each(function() {
            var id = $(this).closest('.js-map-list-item').data('id');

            if ($(this).text().toLowerCase().includes(inputValue)) {
              if($('.filtered-by-age').length > 0 || $('.filtered-by-type').length > 0){
                if($(document).find(`g#${id}`).hasClass('filtered-by-age') || $(document).find(`g#${id}`).hasClass('filtered-by-type')){
                  $(`g#${id}`).show().addClass('filtered-by-keyword');
                  $(this).closest('.js-map-list-item').show();
                }
              } else {
                $(`g#${id}`).show().addClass('filtered-by-keyword');
                $(this).closest('.js-map-list-item').show();
              }
            } else {
              $(this).closest('.js-map-list-item').hide();
            }

            if(!inputValue){
              $('.js-map-list-item').show();
              pins.removeClass('filtered-by-keyword');
            }
          });
        }

        //Filter by keyword
        keywordInput.on('input paste keyup', function(){
          var keyword = keywordInput.val();
          filterByKeyword(keyword);

          if(selectedAges.length > 0){
            filterPlacesByAge(null);
          }

          if(selectedTypes.length > 0){
            filterPlacesByType(null);
          }
        });

        //Filter by age
        $('.js-checkbox-age').on('click', function(){
          var ageId = $(this).val();
          filterPlacesByAge(ageId);

          if(selectedTypes.length > 0){
            filterPlacesByType(null);
          }

          if(keywordInput.val()){
            var keyword = keywordInput.val();
            filterByKeyword(keyword);
          }
        });
        
        //Filter by type
        $('.js-checkbox-type').on('click', function(){
          var typeId = $(this).val();
          filterPlacesByType(typeId);

          if(selectedAges.length > 0){
            filterPlacesByAge(null);
          }

          if(keywordInput.val()){
            var keyword = keywordInput.val();
            filterByKeyword(keyword);
          }
        });

        //Init infobox
        pins.on('click', function(){
          var id = $(this).attr('id');
          var selectedPlace = places.find(e => e.place_id == id);

          var infoBoxContent = 
          `<div class="js-map-list-item map--list-item" data-id="${selectedPlace.place_id}">
            <img src="${localize.themeurl}/assets/img/svg/modal-close-x.svg" alt="" class="js-remove-selection remove-selection">
            <div class="name__wrapper">
                <img src="${localize.themeurl}/assets/img/svg/pin.svg" alt="">
                <p class="place-name">${selectedPlace.place_name}</p>
            </div>
          </div>`;

          infoBox
          .html(infoBoxContent)
          .css({
            top:   $(this).offset().top - 40,
            left:  $(this).offset().left - 60,
            display: 'block'
          });
        })

        //Clear infobox
        $(document).on('click', '.js-remove-selection', function(){
          $(this).parent().remove();
        });

        //Toggle primary filter on tablet, mobil
        $('.js-toggle-primary-filter').on('click', function(){
          $('.js-map-primary-filter, .js-toggle-primary-filter').toggleClass('active');
        });

        $('.js-checkbox-filter-accordion').on('click', function(){
          $(this).next('.js-checkbox-filter').toggleClass('active');
        });

        $('.js-init-program-filter-modal').on('click', function(){
          modal.addClass('is-active')
        });

        $('.js-close-program-filter-modal, .js-checkbox-filter-show-programs').on('click', function(e){
          modal.removeClass('is-active')
        });

        $('.js-checkbox-filter-accordion').on('click', function(){
          $(this).next('.js-checkbox-filter').toggleClass('is-visible');
        });

        $('.js-init-program-list-modal').on('click', function(){
          $('.js-map-primary-filter').toggleClass('active');
        });
    });
})(jQuery);