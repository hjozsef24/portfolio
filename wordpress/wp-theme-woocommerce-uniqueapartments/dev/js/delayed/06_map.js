(function ($) {
  "use strict";
  $(function () {
    var map = $(".js-map");

    if (!map.length) {
      return;
    }

    var lat = map.data("lat");
    var lng = map.data("lng");
    var markerIcon = map.data("marker")
    var marker = L.icon({ iconUrl: markerIcon });

    var customFilter = ["grayscale:100%", "bright:100%", "contrast:115%"];

    var osm = L.tileLayer.colorFilter(
      "https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png",
      {
        maxZoom: 19,
        attribution: "",
        filter: customFilter,
      }
    );

    
    map = L.map("map", {
        center: [lat, lng],
        zoom: 12,
        layers: [osm],
    });

    new L.marker([lat, lng], { icon: marker }).addTo(map)
  });
})(jQuery);
