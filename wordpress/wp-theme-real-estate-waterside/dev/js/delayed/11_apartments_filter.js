(function ($) {
    $(() => {
        
        // Event for reset Apartment's filter
        const deleteFilters = $('.js-delete-filters');

        deleteFilters.on('click', function (e) {
            e.preventDefault();
            const theForm = $(this).closest('form');
            theForm.trigger('reset');
            history.pushState(null, '', location.href.split('?')[0]);
            location.reload();
        });

        // Set up Apartment's filter input values
        const urlParameters = new URLSearchParams(window.location.search);
        const formParameters = Object.fromEntries(urlParameters.entries());

        Object.entries(formParameters).map((parameter) => {
            const name = parameter[0];
            const value = parameter[1];
            if (name == 'rooms[]' || name == 'building[]') {
                $(`#${value}`).prop('checked', true);
            } else {
                $(`#${name}`).val(value).change();
            }
        });
    });
})(jQuery);
