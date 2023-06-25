(function($) {
    $(function() {
        const theForm = $('.js-newsletter-form');
        if (!theForm.length) {
            return;
        }

        $(document).on('keydown', 'input, textarea', function(e) {
            $(this)
                .parent('.form-group')
                .removeClass('has-error');
            $(this)
                .next('.error-message')
                .text();
        });

        $(document).on('change', 'input[type="checkbox"], select', function(e) {
            $(this)
                .parent('.form-group')
                .removeClass('has-error');
        });

        theForm.submit(function(e) {
            e.preventDefault();

            const formData = theForm.serializeArray();

            $.ajax({
                url: localize.ajaxurl,
                type: 'POST',
                data: {
                    action: 'newsletter_form',
                    datas: formData
                },
                error: function(error) {
                    console.log(error);
                },
                success: function(data) {
                    var result = JSON.parse(data);
                    var fields = [...new Set(result['fields'])];

                    if (result['status'] == 'success') {
                        theForm.trigger('reset');
                        $('body').addClass('body--fixed');
                        $('.js-newsletter-modal-success').show();
                        $('.js-newsletter-modal, .overlay').addClass('is-visible');
                    } else {
                        $(fields).each(function(i, e) {
                            theForm
                                .find(`[name=${e.field}]`)
                                .parent('.form-group')
                                .addClass('has-error');
                            theForm
                                .find(`[name=${e.field}]`)
                                .next('.error-message')
                                .text(e.message);
                        });
                    }
                }
            });
        });

        $('.js-close-newsletter-modal').on('click', function(e) {
            e.preventDefault();
            $('.js-newsletter-modal, .overlay').removeClass('is-visible');
            $('body').removeClass('body--fixed');
        });
    });
})(jQuery);
