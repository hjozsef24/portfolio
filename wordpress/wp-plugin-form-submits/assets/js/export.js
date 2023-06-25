(function ($) {
    $(function () {
       const filterForm = $('.js-filter-form');

       $('.js-export-records').on('click', function(e){
        e.preventDefault();

        const formData = filterForm.serializeArray();

        $.ajax({
            url: ajax_object.ajax_url,
            type: "POST",
            data: {
                action: "exportRecords",
                datas: formData
            },
            error: function (error) {
                console.log(error)
            },
            success: function (data) {
                var downloadLink = document.createElement("a");

                var fileData = ['\ufeff'+data];

                var blobObject = new Blob(fileData,{
                   type: "text/csv;charset=utf-8;"
                });

                var url = URL.createObjectURL(blobObject);
                downloadLink.href = url;
                downloadLink.download = "incoming_messages.csv";
               
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            },
        });
        return;
       });

    });
})(jQuery);