(function ($) {
  $(function () {
    const wishlistButton = $(".js-toggle-wishlist");

    // Set wishlist cookie
    if (!Cookies.get("wishlist")) {
      var wishlist = [];
    } else {
      var wishlist = JSON.parse(Cookies.get("wishlist"));
    }

    // Add or remove wishlist items
    wishlistButton.on("click", function (e) {
      e.preventDefault();
      var id = $(this).data("id");

      if (!wishlist.includes(id)) {
        wishlist.push(id);
      } else {
        wishlist = wishlist.filter((e) => e != id);
      }
      Cookies.set("wishlist", JSON.stringify(wishlist));
    });
  });
})(jQuery);
