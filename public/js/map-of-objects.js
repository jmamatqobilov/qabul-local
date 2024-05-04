ymaps.ready(init);

function init() {
    // let ymaps;
    var geolocation = ymaps.geolocation,
        myPlacemark,
        myMap = new ymaps.Map('map', {
            center: [55, 34],
            zoom: 10,
            controls: []
        }, {
            searchControlProvider: 'yandex#search'
        });

    function createPlacemark(coords) {
        myPlacemark = new ymaps.Placemark(coords, {
            iconCaption: 'поиск...'
        }, {
            preset: 'islands#violetDotIconWithCaption',
            draggable: true
        });
        myMap.geoObjects.add(myPlacemark);
    }
}
