(function ($) {
  $(function () {
    const category = $(".js-shop-the-look-category");

    if (!category.length) {
      return;
    }

    // Declare variables
    const pill = $(".js-shop-the-look-category-pill");
    const shopTheLookItem = $(".js-shop-the-look-item");
    const resultCounter = $(".js-results-counter");
    const resetFilters = $(".js-reset-shop-the-look-filters");

    // Function for the first initialization of the pill
    function initPill() {
      const firstCategory = category.first();
      const width = firstCategory.outerWidth();
      const top = firstCategory.position().top;
      firstCategory.addClass("is-selected");

      pill.css({
        opacity: "1",
        width: `${width}px`,
        transform: `translateY(calc(${top}px - 12px)`,
      });
    }

    // Function for translating the pill's position
    function translatePill(item) {
      const left = item.position().left;
      const top = item.position().top;
      const width = item.outerWidth();

      category.removeClass("is-selected");
      item.addClass("is-selected");

      pill.css({
        transform: `translate(calc(${left}px - 24px), calc(${top}px - 12px))`,
        width: `${width}px`,
      });
    }

    // Function to load all the items in every categories
    function loadAllCategories() {
      shopTheLookItem.show();
    }

    // Function to load items in selected category
    function loadSelectedCategory(selectedCategory) {
      shopTheLookItem.each(function () {
        var categories = $(this).attr("data-categories");

        if (categories.includes(selectedCategory)) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    }

    // Function to count visible items
    function countResults() {
      const visibleItems = shopTheLookItem.not(":hidden").length;
      resultCounter.text(visibleItems);
    }


    // Function for a fancy scrolling
    function scrollingAnimation(shopTheLookItem) {
      const viewportHeight = window.innerHeight
      shopTheLookItem.each(function (e) {
        if ($(this)[0].getBoundingClientRect().top  < viewportHeight) {
          $(this).css("-webkit-animation-play-state", "running");   
        }
      })
    }

    $(window).scroll(function(){
      scrollingAnimation(shopTheLookItem)
    });

    $(document).ready(function(e){
      scrollingAnimation(shopTheLookItem)
    })


    category.on("click", function (e) {
      e.preventDefault();
      const selectedCategory = $(this);
      const selectedCategoryID = selectedCategory.data("category");

      translatePill(selectedCategory);

      if (selectedCategoryID == "all") {
        loadAllCategories();
        resetFilters.hide();
      } else {
        loadSelectedCategory(selectedCategoryID);
        resetFilters.show();
      }
      countResults();
      scrollingAnimation(shopTheLookItem)
    });

    resetFilters.on("click", function (e) {
      e.preventDefault();
      resetFilters.hide();
      loadAllCategories();
      countResults();
      translatePill(category.first());
    });

    initPill();
    countResults();
  });
})(jQuery);
