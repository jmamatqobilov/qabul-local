<div class="table-filter">
    @includeIf('includes.filter')
</div>
<div class="map-content" id="map">
{{--@dd($objects)--}}
</div>
<script>
    console.log(ymaps);
    ymaps.ready(init);
{{--@dd($application, /*null*/--}}
{{--$objects,  /*null*/--}}
{{--$userRole, /*role \ ukn*/--}}
{{--$filters, /*3*/--}}
{{--$whole  /*true*/)--}}
    console.log('log');
{{--    @dd($objects)--}}
{{--    @dd($whole)--}}

    function init () {
        var myMap = new ymaps.Map('map', {
                center: [41.765066, 63.150118],
                zoom: 5
            }),
            objectManager = new ymaps.ObjectManager();

        // ukn all objects in directions
        @if($whole)
{{--            @dd(Arr::add(\Request::all(),'option','json')) --}}{{-- option => json --}}
            $.getJSON('{!! route('ukn.map.index', Arr::add(\Request::all(),'option','json')) !!}')
                .done(function (geoJson) {
                    objectManager.add(geoJson);
                    myMap.geoObjects.add(objectManager);
                });
        @else
            @foreach($objects as $object)
            var polyLineCords = JSON.parse('{{$object->punkt_ustanovki_location}}');
            var myPlacemark = new ymaps.Placemark(polyLineCords[0], {
                'balloonContent' : '{!! __('messages.object-balloon',
                    [
                    'ahref' => route($userRole->code.'.applications.objects.show', ['application' => $object->application->id, 'object' => $object->id]),
                    'id' => $object->id,
                    'object-type' => $object->object_type->name,
                    'applicant' => $object->application->owner->company_name
                    ]) !!}',
                'clusterCaption' : "{{$object->object_type->name}}",
                'hintContent' : "{{$object->object_type->name}}"
            }, {
                preset: 'islands#violetDotIconWithCaptionp',
                draggable: true
            });
            myMap.geoObjects.add(myPlacemark);
            console.log(polyLineCords.length)
            if(polyLineCords.length > 1) {
                var myPolyline = new ymaps.Polyline(polyLineCords, {
                        'balloonContent' : '{!! __('messages.object-balloon',
                            [
                            'ahref' => route($userRole->code.'.applications.objects.show', ['application' => $object->application->id, 'object' => $object->id]),
                            'id' => $object->id,
                            'object-type' => $object->object_type->name,
                            'applicant' => $object->application->owner->company_name
                            ]) !!}'
                    }, {
                        balloonCloseButton: false,
                        strokeColor: "#1b55cf",
                        strokeWidth: 3,
                        strokeOpacity: 0.5
                    }
                );
                myMap.geoObjects.add(myPolyline);
            }
            @endforeach
        @endif
    }
</script>
