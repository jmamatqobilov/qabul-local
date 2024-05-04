/*! crit-tech v0.0.1 | (c) 2020 RUSTAM KHASANOV | https://github.com/icid5post */
ymaps.ready(init);

function init() {
    var myPlacemark,
        myMap = new ymaps.Map('map-box', {
            center: [41.31156518826389, 69.2605109257812],
            zoom: 12,
            controls: ['zoomControl', 'searchControl']
        });
    myMap.events.add('boundschange', (function (event) {
        if (event.get('newCenter ') != event.get('oldCenter')) {
            getAddress(event.get('newCenter'));
        }
    }));

    // Определяем адрес по координатам (обратное геокодирование).
    function getAddress(coords) {
        ymaps.geocode(coords).then((function (res) {
            var firstGeoObject = res.geoObjects.get(0);
            $('#objectAddress').val(firstGeoObject.getAddressLine());
            $('#lat').val(coords[0]);
            $('#lang').val(coords[1]);
        }));
    }
}