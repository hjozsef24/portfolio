(function ($) {
  $(function () {
    const theForm = $(".js-get-in-touch-form");

    if (!theForm.length) {
      return;
    }

    var hasLetterRegex = "[a-zA-ZÀ-ÖØ-öø-ÿ-]";
    function removeLetters(string) {
      var r = new RegExp(hasLetterRegex, "g");
      return string.replace(r, "");
    }

    function formatPhoneNumber(string) {
      return removeLetters(string).replace(" ", "");
    }

    $(document).on("keypress keyup blur", ".js-phone", function () {
      this.value = formatPhoneNumber(this.value);
    });

    $(document).on("keydown", "input, textarea", function (e) {
      $(this).parent(".input-group").removeClass("has-error");
      $(this).next(".error-message").text("");
    });

    $(document).on("change", 'input[type="checkbox"], select', function (e) {
      $(this).parent(".input-group").removeClass("has-error");
    });

    theForm.submit(function (e) {
      e.preventDefault();

      const formData = theForm.serializeArray();

      $.ajax({
        url: localize.ajaxurl,
        type: "POST",
        data: {
          action: "get_in_touch_form",
          datas: formData,
        },
        error: function (error) {},
        success: function (data) {
          var result = JSON.parse(data);
          var fields = [...new Set(result["fields"])];

          if (result["status"] == "success") {
            theForm.trigger("reset");
            theForm.add('.js-contact-subject').hide();
            $('.js-success-form-submit-text').show();
          } else {
            $(fields).each(function (i, e) {
              theForm
                .find(`[name=${e.field}]`)
                .parent(".input-group")
                .addClass("has-error");
              theForm
                .find(`[name=${e.field}]`)
                .next(".error-message")
                .text(e.message);
            });

            $("html, body").animate(
              { scrollTop: theForm.offset().top - 50 },
              1000
            );
          }
        },
      });
    });
  });
})(jQuery);
