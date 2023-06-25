(function($) {
    $(function() {
        var question = $('.js-faq-question');
        var answer = $('.js-faq-answer');
        var plus = $('.plus-minus-toggle');

        if(!question.length){
            return;
        }

        question.on('click', function() {
            var currentAnswer = $(this).children(answer);
            var currentPlus = $(this).find(plus);
            answer.slideUp();
            plus.addClass('collapsed');
            

            if (currentAnswer.is(':not(:visible)')) {
                currentPlus.removeClass('collapsed');
                currentAnswer.slideDown();
            }

        });
    });
})(jQuery);

