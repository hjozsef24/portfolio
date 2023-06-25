(function ($) {
  $(function () {
    const resetFilters = $(".js-reset-filters");
    const resultsCounter = $(".js-results-counter");
    const filterModalToggle = $(".js-toggle-filter-modal");
    var countedItems = $(".js-product-list").data("counted-items");
    countedItems = countedItems ? countedItems : 0;

    resetFilters.on("click", function (e) {
      e.preventDefault();
      const theForm = $(this).closest("form");
      theForm.trigger("reset");
      history.pushState(null, "", location.href.split("?")[0]);
      location.reload();
    });

    const urlParameters = new URLSearchParams(window.location.search);
    const formParameters = Object.fromEntries(urlParameters.entries());
    var countedParameters = 0;

    Object.entries(formParameters).map((parameter) => {
      var name = parameter[0];
      var value = parameter[1];

      if (name == "garden" || name == "balcony") {
        $("#" + name).prop("checked", true);
      } else {
        $("#" + name)
          .val(value)
          .change();
      }

      if(value !== ""){
        countedParameters++;
      }
    });

    if ($(window).width() < 768 && countedParameters > 0) {
      $(".js-filter-counter").show().text(countedParameters);
    }

    if (resultsCounter.length) {
      var countedText = countedItems > 1 ? "results" : "result";
      resultsCounter.text(countedItems + " " + countedText);
    }

    $(".js-input-number").on("input", function () {
      var number = $(this).val().replace(/\D/g, "");

      if (number == "") {
        $(this).val(number);
        return;
      }

      number = number.replace(/\s/g, "");

      if (/\d/.test(number)) {
        number = number.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        $(this).val(number);
      }
    });

    filterModalToggle.on("click", function (e) {
      e.preventDefault();
      $(".js-filter-modal").toggleClass("is-active");
      $("html, body").toggleClass("overflow-hidden");
      $("html").toggleClass("has-overlay");
    });
  });
})(jQuery);
