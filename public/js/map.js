ymaps.ready(init);

function init() {
    var geolocation = ymaps.geolocation,
        isNeededToFind = ($('input[name="punkt_ustanovki_location"]').val() === ''),
        myPlacemark, myPolyline, polyLineCords = [],
        myMap = new ymaps.Map('map', {
            center: [55, 34],
            zoom: 6,
            controls: []
        }, {
            searchControlProvider: 'yandex#search'
        });

    if(!$('#map').attr('readonly')){
        myMap.events.add('click', function (e) {
            var coords = e.get('coords');
            drawPolyline(coords);        });
        myMap.events.add('contextmenu', function (e) {
            clearMap();
            e.preventDefault();
        });
        $('form input').keydown(function (e) {
            if (e.keyCode == 13) { e.preventDefault(); $(this).trigger('change'); return false; }
        });
        $('#coordinates').on('change', function(e){
            var value = $(this).val();
            var reg = new RegExp("^([-+]?)([\\d]{1,2})(((\\.)(\\d+)(,)))(\\s*)(([-+]?)([\\d]{1,3})((\\.)(\\d+))?)$");
            if(reg.exec(value)){
                var latlng = value.split(',');
                var cords = [latlng[0].trim(), latlng[1].trim()];
                drawPolyline(cords);
                myMap.setCenter(cords);
                $(this).val('');
            }
        });
    }
    function clearMap() {
        myPlacemark = undefined;
        myPolyline = undefined;
        polyLineCords = [];
        $('input[name="punkt_ustanovki_location"]').val('');
        myMap.geoObjects.removeAll();
    }
    function drawPolyline(cords){
        if (!myPlacemark) {
            createPlacemark(cords);
            getAddress(cords);
        }
        polyLineCords.push(cords);
        if (myPolyline) {
            myPolyline.geometry.setCoordinates(polyLineCords);
        }else{
            myPolyline = new ymaps.Polyline(polyLineCords, {
                balloonContent: "ВОЛС"
            }, {
                balloonCloseButton: false,
                strokeColor: "#1b55cf",
                strokeWidth: 3,
                strokeOpacity: 0.5
            });
            myMap.geoObjects.add(myPolyline);
        }
        $('input[name="punkt_ustanovki_location"]').val(JSON.stringify(polyLineCords));
    }
    function createPlacemark(coords) {
        if (!myPlacemark) {
            myPlacemark = new ymaps.Placemark(coords, {
                iconCaption: 'поиск...'
            }, {
                preset: 'islands#violetDotIconWithCaption',
                draggable: true
            });
            myMap.geoObjects.add(myPlacemark);
            myPlacemark.events.add('dragend', function () {
                getAddress(myPlacemark.geometry.getCoordinates());
            });
        }
        $('input[name="punkt_ustanovki_location"]').val(JSON.stringify(polyLineCords));
    }

    function getAddress(coords) {
        myPlacemark.properties.set('iconCaption', 'поиск...');
        ymaps.geocode(coords).then(function (res) {
            var firstGeoObject = res.geoObjects.get(0);
            myPlacemark.properties
                .set({
                    iconCaption: [
                        firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                        firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                    ].filter(Boolean).join(', '),
                    balloonContent: firstGeoObject.getAddressLine()
                });
            $('input[name="punkt_ustanovki"]').val(firstGeoObject.getAddressLine());
        });
    }

    if(isNeededToFind){
        geolocation.get({
            provider: 'yandex',
            mapStateAutoApply: true
        }).then(function (result) {
            var coords = result.geoObjects.get(0).geometry.getCoordinates()
            myMap.setCenter(coords, 8);
        });

        geolocation.get({
            provider: 'browser',
            mapStateAutoApply: true
        }).then(function (result) {
            var coords = result.geoObjects.get(0).geometry.getCoordinates()
            myMap.setCenter(coords, 14);
        });
    }else{
        var coords = JSON.parse($('input[name="punkt_ustanovki_location"]').val());
        coords.forEach(function (item, index) {
            drawPolyline(item);
            myMap.setCenter(item, 14);
        });
    }
}
