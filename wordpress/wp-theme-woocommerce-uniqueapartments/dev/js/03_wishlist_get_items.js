(function ($) {
  $(function () {
    const wishlistContainer = $(".js-wishlist-container");

    if (!wishlistContainer.length) {
      return;
    }

    // Get products from wishlist
    const itemsOnWishlist = JSON.parse(Cookies.get("wishlist"));
    $.ajax({
      url: localize.ajaxurl,
      type: "POST",
      data: {
        action: "get_wishlist_products",
        data: itemsOnWishlist,
      },
      error: function (error) {
        console.log(error);
      },
      success: function (response) {
        wishlistContainer.append(response);
      },
    });
  });
})(jQuery);
