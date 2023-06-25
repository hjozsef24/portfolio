(function ($) {
    $(function () {
        const theForm = $('.js-contact-form');

        if (!theForm.length) {
            return;
        }

        $(document).on('focus blur', '.js-form-item', function () {
            const placeholder = $(this).children('.js-input-label-active');
            const input = $(this).children('input, textarea')

            if(input.val()){
                return;
            }

            placeholder.toggleClass('expanded')
        });

        $(document).on('keydown', 'input, textarea', function (e) {
            $(this).parent('.form-item').removeClass('has--error');
        });

        $(document).on('change', 'input[type="checkbox"]', function (e) {
            $(this).closest('.form-item').removeClass('has--error');
        });

        theForm.submit(function (e) {
            e.preventDefault()

            const formData = theForm.serializeArray();

            $.ajax({
                url: localize.ajax_url,
                type: "POST",
                data: {
                    action: "send_form",
                    datas: formData
                },
                error: function (error) {
                    console.log(error)
                },
                success: function (data) {
                    var result = JSON.parse(data);
                    var fields = [...new Set(result['fields'])];

                    if (result['status'] == 'success') {
                        $(theForm).trigger("reset");
                        window.location.href = localize.success_form_submit_page_url;
                    } else{
                        $(fields).each(function (i, e) {
                            theForm.find(`[name=${e.field}]`).closest('.form-item').addClass('has--error');
                            if(e.field == "gdpr"){
                                $('.checkbox-group.has--error .error-message').text(e.message);
                            } else{
                                theForm.find(`[name=${e.field}]`).next('.error-message').text(e.message);
                            }
                        });
                    }
                },
            });
        });
    });
})(jQuery);