import $ from "jquery";
import "leaflet";

const simpleMap = () => {
  let mapBlock = $(".js-simple-map");

  if (!mapBlock.length) {
    return;
  }

  mapBlock.each((index, item) => {
    let map = $(item);
    let mapId = map.attr("id");

    let location = map.data("location");
    let pin = map.data("pin");

    map = L.map(mapId).setView([location.lat, location.lng], 16);
    map.scrollWheelZoom.disable();

    L.tileLayer("https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png", {
        attribution: "",
      })
      .addTo(map);

    const marker = L.icon({
      iconUrl: pin,
      iconSize: [48, 48],
      iconAnchor: [24, 48],
      shadowSize: [0, 0],
    });

    L.marker([location.lat, location.lng], { icon: marker }).addTo(map);
  });
};

export default simpleMap;