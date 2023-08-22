(function ($) {
    $(() => {
        let map = $('.js-filterable-map');
        if (!map.length) {
            return;
        }
        const locations = localize.filterable_map_locations;
        const filterCategory = $('.js-filter-category');

        const customFilter = [
            'grayscale:70%',
            'bright:90%',
            'contrast:115%',
            'hue:359deg',
            'saturate:80%',
            'sepia:10%',
        ];

        // Create the map layer
        const osm = L.tileLayer.colorFilter(
            'https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png',
            {
                maxZoom: 19,
                attribution: '© OpenStreetMap',
                filter: customFilter,
            }
        );

        // Init the map
        map = L.map('map', {
            center: [47.4819447, 19.1285706],
            zoom: 10,
            layers: [osm],
        });

        map.scrollWheelZoom.disable();

        // Create the markers
        const layers = [];
        for (const currentLayer in locations) {
            const markers = [];
            const places = locations[currentLayer];
            for (let i = 0; i < places.length; i++) {
                const place = places[i];
                const marker = L.icon({ iconUrl: place.marker });
                markers.push(new L.marker([place.lat, place.lng], { icon: marker }));
            }

            // Add the layergroup to the map
            layers[`layer_${currentLayer}`] = L.layerGroup(markers).addTo(map);
        }

        filterCategory.on('click', function () {
            filterCategory.not(this).removeClass('is-selected');
            $(this).addClass('is-selected');
            const selectedLayerId = $(this).data('id');

            if (selectedLayerId == 'all') {
                Object.keys(layers).forEach((key, index) => {
                    map.addLayer(layers[key]);
                });
                return;
            }

            Object.keys(layers).forEach((key, index) => {
                if (key == `layer_${selectedLayerId}`) {
                    map.addLayer(layers[key]);
                } else {
                    map.removeLayer(layers[key]);
                }
            });
        });
    });
})(jQuery);
