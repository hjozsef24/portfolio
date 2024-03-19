import $ from 'jquery'

const submitNewsletterForm = () => {
  const newsletterForm = $('.js-newsletter-form');
  const loader = $('.js-loader');
  const submitButton = $('.js-submit-button');
  const successBlock = $('.js-success-block');
  const newsletterBlock = $('.js-newsletter-block');
  const resetFormBlockButton = $('.js-reset-form-block');

  $(document).on("keydown", "input", function () {
    $(this).closest(".js-input-group").removeClass("has-error");

    $(this).val() != ""
      ? $(this).addClass("has-value")
      : $(this).removeClass("has-value");
  });

  $(document).on("change", 'input[type="checkbox"]', function (e) {
    $(this).closest(".js-input-group").removeClass("has-error");
  });

  resetFormBlockButton.on("click", function(e){
    e.preventDefault();
    successBlock.hide();
    newsletterBlock.show();
  });

  newsletterForm.on('submit', function(e) {
    e.preventDefault()

    const formData = newsletterForm.serializeArray()
    const listId = $(this).data('list_id');

    submitButton.hide();
    loader.show();

    $.ajax({
      url: ajax.url,
      type: 'POST',
      data: {
        action: 'submit_newsletter_form',
        datas: formData,
        list_id: listId
      },
      error (error) {
        submitButton.show();
        loader.hide();
        console.error(error)
      },
      success (data) {
        const result = JSON.parse(data)
        const fields = [...new Set(result.fields)]

        if (result.status == 'success') {
            newsletterForm.trigger('reset');
            newsletterBlock.hide();
            successBlock.show();
        } else if (!$.isEmptyObject(fields)) {
          $(fields).each((i, e) => {
            newsletterForm
              .find(`[name=${e.field}]`)
              .closest('.js-input-group')
              .addClass('has-error')
              newsletterForm
              .find(`[name=${e.field}]`)
              .nextAll('.js-helper-text')
              .text(e.message)
          })
        }

        submitButton.show();
        loader.hide();
      }
    })
  })
}

export default submitNewsletterForm;
