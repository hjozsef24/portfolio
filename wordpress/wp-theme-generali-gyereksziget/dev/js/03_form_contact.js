(function($) {
    $(function() {
        const contactForm = $('.js-contact-form');
        if (!contactForm.length) {
            return;
        }

        var hasLetterRegex = '[a-zA-ZÀ-ÖØ-öø-ÿ-]';
        function removeLetters(string) {
            var r = new RegExp(hasLetterRegex, 'g');
            return string.replace(r, '');
        }

        function formatPhoneNumber(string) {
            return removeLetters(string).replace(' ', '');
        }

        $(document).on('keypress keyup blur', '.js-phone', function() {
            this.value = formatPhoneNumber(this.value);
        });

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

        contactForm.submit(function(e) {
            e.preventDefault();

            const formData = contactForm.serializeArray();

            $.ajax({
                url: localize.ajaxurl,
                type: 'POST',
                data: {
                    action: 'contact_form',
                    datas: formData
                },
                error: function(error) {
                    console.log(error);
                },
                success: function(data) {
                    var result = JSON.parse(data);
                    var fields = [...new Set(result['fields'])];

                    if (result['status'] == 'success') {
                        contactForm.trigger('reset');
                        $('body').addClass('body--fixed');
                        $('.js-contact-modal-success').show();
                        $('.js-contact-modal, .overlay').addClass('is-visible');

                    } else {
                        $(fields).each(function(i, e) {
                            contactForm
                                .find(`[name=${e.field}]`)
                                .parent('.form-group')
                                .addClass('has-error');
                            contactForm
                                .find(`[name=${e.field}]`)
                                .next('.error-message')
                                .text(e.message);
                        });

                        $('html, body').animate({scrollTop: contactForm.offset().top - 50}, 1000);
                    }
                }
            });
        });

        $('.js-close-contact-modal').on('click', function(e) {
            e.preventDefault();
            $('.js-contact-modal, .overlay').removeClass('is-visible');
            $('body').removeClass('body--fixed');
        });
    });
})(jQuery);
