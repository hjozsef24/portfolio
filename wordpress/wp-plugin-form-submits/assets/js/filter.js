(function ($) {
    $(function () {
       const filterForm = $('.js-filter-form');

       filterForm.submit(function(e){
        e.preventDefault();

        const formData = filterForm.serializeArray();

        $.ajax({
            url: ajax_object.ajax_url,
            type: "POST",
            data: {
                action: "getFilteredRecords",
                datas: formData
            },
            error: function (error) {
                console.log(error)
            },
            success: function (data) {
                var result = JSON.parse(data);
                $('.js-data-table-wrapper').html(result);
            },
        });
        return;
       });

    });
})(jQuery);