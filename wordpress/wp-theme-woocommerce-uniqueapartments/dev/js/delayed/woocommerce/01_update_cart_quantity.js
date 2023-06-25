(function ($) {
  $(function () {

    if (!$(".woocommerce-cart").length) {
      return;
    }

    let timeout;

    $(".woocommerce").on("change", "input.qty", function () {
      var quantity = $(this).val();

      if (timeout !== undefined) {
        clearTimeout(timeout);
      }
      timeout = setTimeout(function () {
        $("[name='update_cart']").trigger("click");
        $(".cart-contents-count").text(quantity)
      }, 500);
    });
  });
})(jQuery);
