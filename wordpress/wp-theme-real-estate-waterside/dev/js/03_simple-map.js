(function ($) {
    $(() => {
        let map = $('.js-simple-map');
        if (!map.length) {
            return;
        }

        const location = map.data('location');
        const pin = map.data('pin');
        console.log(pin)

        const customFilter = [
            'grayscale:70%',
            'bright:90%',
            'contrast:115%',
            'hue:359deg',
            'saturate:80%',
            'sepia:10%',
        ];

        // Init the map
        map = L.map('map').setView([location.lat, location.lng], 13);
        
        map.scrollWheelZoom.disable();
        
        L.tileLayer
            .colorFilter('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
                attribution: '',
                filter: customFilter,
            })
            .addTo(map);

        const marker = L.icon({ iconUrl: pin });
        L.marker([location.lat, location.lng], { icon: marker }).addTo(map)
    });
})(jQuery);
