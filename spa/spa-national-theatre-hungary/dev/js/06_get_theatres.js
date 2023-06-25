function getContentByID(id) {
    return data.filter(
        function (data) {
            return data.id == id
        }
    );
}


$(document).on('click', '.theatre', function () {

    let svg_id = ($(this).attr('id'))

    var found = getContentByID(svg_id);

    $(".infowindow-city").text(found[0].city);
    $(".infowindow-title").text(found[0].title);
    $(".infowindow-info").html(found[0].info);

    if(found[0].image.length < 1) {
        $('.infowindow-image').addClass("d-none")
    } else{
        $('.infowindow-image').removeClass("d-none")
        $(".infowindow-image").attr("src", found[0].image);
    }

    $(".infowindow-text").html(found[0].text);
})


