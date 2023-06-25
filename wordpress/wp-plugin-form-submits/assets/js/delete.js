(function ($) {
    $(function () {

        $('.js-delete-records').on('click', function(e){
            e.preventDefault();

            const alertMessage = "Biztos a törlésben? \nA művelet nem visszafordítható!"
            if (confirm(alertMessage) != true) {
                return;
            }

            $.ajax({
                url: ajax_object.ajax_url,
                type: "POST",
                data: {
                    action: "deleteRecords",
                },
                error: function (error) {
                    console.log(error)
                },
                success: function () {
                    alert("Sikeres törlés!");
                    location.reload();
                },
            });
            return;
        });

    });
})(jQuery);