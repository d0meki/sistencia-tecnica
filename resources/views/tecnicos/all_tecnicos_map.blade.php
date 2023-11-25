@extends('layouts.myLayout')

@section('content')
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Google Maps Basic example</h5>
            </div>
            <div class="ibox-content">
                <p>
                    With google maps <a href="https://developers.google.com/maps/documentation/javascript/reference#MapOptions">API</a> You can easy customize your map.
                </p>
                <div class="google-map" id="map1"></div>
            </div>
        </div>
    </div>
    <div class="col-md-3">

    </div>
</div>
@endsection
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
<script type="text/javascript">
    // When the window has finished loading google map
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Options for Google map
        // More info see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var tecnicos = @json($tecnicos);
        console.log(tecnicos);
        var markers = [];
        var mapOptions1 = {
            zoom: 12,
            center: new google.maps.LatLng(-17.78318, -63.181252),
            // Style for Google Maps
            styles: [{
                "featureType": "water",
                "stylers": [{
                    "saturation": 43
                }, {
                    "lightness": -11
                }, {
                    "hue": "#0088ff"
                }]
            }, {
                "featureType": "road",
                "elementType": "geometry.fill",
                "stylers": [{
                    "hue": "#ff0000"
                }, {
                    "saturation": -100
                }, {
                    "lightness": 99
                }]
            }, {
                "featureType": "road",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#808080"
                }, {
                    "lightness": 54
                }]
            }, {
                "featureType": "landscape.man_made",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ece2d9"
                }]
            }, {
                "featureType": "poi.park",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ccdca1"
                }]
            }, {
                "featureType": "road",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#767676"
                }]
            }, {
                "featureType": "road",
                "elementType": "labels.text.stroke",
                "stylers": [{
                    "color": "#ffffff"
                }]
            }, {
                "featureType": "poi",
                "stylers": [{
                    "visibility": "off"
                }]
            }, {
                "featureType": "landscape.natural",
                "elementType": "geometry.fill",
                "stylers": [{
                    "visibility": "on"
                }, {
                    "color": "#b8cb93"
                }]
            }, {
                "featureType": "poi.park",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi.sports_complex",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi.medical",
                "stylers": [{
                    "visibility": "on"
                }]
            }, {
                "featureType": "poi.business",
                "stylers": [{
                    "visibility": "simplified"
                }]
            }]
        };
        // Get all html elements for map
        var mapElement1 = document.getElementById('map1');

        // Create the Google Map using elements
        var map1 = new google.maps.Map(mapElement1, mapOptions1);

        // $tecnico
        const image =
            "https://developers.google.com/maps/documentation/javascript/examples/full/images/library_maps.png";
        tecnicos.forEach(tecnico => {
            const initialPosition = {
                lat: Number(tecnico.latitud),
                lng: Number(tecnico.longitud)
            };

            let marker = new google.maps.Marker({
                // position: event.latLng,
                position: initialPosition,
                map: map1,
                icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/library_maps.png",
                // icon: image,
                size: new google.maps.Size(20, 32),
                // El origen para esta imagen es (0, 0).
                origin: new google.maps.Point(0, 0),
                // El ancla para esa imagen es la base del asta bandera en (0, 32).
                anchor: new google.maps.Point(0, 32),
                title: `Técnico: ${tecnico.user.nombre}`
            });
            markers.push(marker);
        });
    }
</script>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap"></script> -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script> -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQTpXj82d8UpCi97wzo_nKXL7nYrd4G70"></script> -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQTpXj82d8UpCi97wzo_nKXL7nYrd4G70&callback=initMap"></script> -->
