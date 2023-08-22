(function ($) {
    $(() => {
        const hasLetterRegex = '[a-zA-ZÀ-ÖØ-öø-ÿ+-]';
        function removeLetters(string) {
            const r = new RegExp(hasLetterRegex, 'g');
            return string.replace(r, '');
        }

        function formatNumber(string) {
            return removeLetters(string).replace('+', '').replace(' ', '');
        }

        $(document).on('keypress keyup blur', '.js-input-number', function () {
            this.value = formatNumber(this.value);
        });

        // Function to copy to clipboard
        function copyToClipboard(element) {
            const $temp = $('<input>');
            $('body').append($temp);
            $temp.val(element).select();
            document.execCommand('copy');
            $temp.remove();
        }

        $(document).on("click", ".js-copy-url", function(e) {
            e.preventDefault();
            var url = $(this).data('permalink');
            copyToClipboard(url);
        });
    });
})(jQuery);
