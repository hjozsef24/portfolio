(function ($) {
  $(function () {
    const languageSelector = $(".js-language-selector");

    if (!languageSelector.length) {
      return;
    }

    const hiddenLanguages = $(".js-hidden-languages");

    languageSelector.on("click", function (e) {
      hiddenLanguages.toggleClass("is-visible");
      $(".js-language-selector .active").toggleClass("is-submenu-visible");
    });
  });
})(jQuery);
