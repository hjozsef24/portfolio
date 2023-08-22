(function ($) {
    $(() => {
        const theForm = $('.js-contact-form');

        if (!theForm.length) {
            return;
        }

        $(document).on('keydown', 'input, textarea', function (e) {
            $(this).parent('.input-group').removeClass('has-error');
            $(this).next('.error-message').text('');
        });

        $(document).on('change', 'input[type="checkbox"], select', function (e) {
            $(this).parent('.input-group').removeClass('has-error');
        });

        theForm.submit((e) => {
            e.preventDefault();

            const formData = theForm.serializeArray();
            const apartmentId = theForm.data('apartment-id');

            $.ajax({
                url: localize.ajaxurl,
                type: 'POST',
                data: {
                    action: 'submit_contact_form',
                    datas: formData,
                    apartment_id: apartmentId
                },
                error(error) {},
                success(data) {
                    const result = JSON.parse(data);
                    const fields = [...new Set(result.fields)];

                    if (result.status == 'success') {
                        theForm.trigger('reset').hide();
                        $('.js-hide-on-success').hide();
                        $('.js-success-contact-form-submit').show();
                    } else {
                        $(fields).each((i, e) => {
                            theForm
                                .find(`[name=${e.field}]`)
                                .parent('.js-input-group')
                                .addClass('has-error');
                            theForm
                                .find(`[name=${e.field}]`)
                                .nextAll('.js-error-message')
                                .text(e.message);
                        });
                    }
                },
            });
        });
    });
})(jQuery);
