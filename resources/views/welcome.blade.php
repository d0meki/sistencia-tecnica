<!DOCTYPE html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Reclamos Municipales</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .border-gray-200 {
            --tw-border-opacity: 1;
            border-color: rgb(229 231 235 / var(--tw-border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);
            --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity))
        }

        .text-gray-300 {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity))
        }

        .text-gray-400 {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --tw-bg-opacity: 1;
                background-color: rgb(31 41 55 / var(--tw-bg-opacity))
            }

            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }

            .dark\:border-gray-700 {
                --tw-border-opacity: 1;
                border-color: rgb(55 65 81 / var(--tw-border-opacity))
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .dark\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: rgb(107 114 128 / var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Iniciar sesion</a>

            @endauth
        </div>
        @endif
        <style>
            /* CSS para el mapa */
            #map {
                height: 500px;
                width: 100%;
            }
        </style>

        <div id="map"></div>


        <script>
            // const axios = require('axios');
            // window.axios = require('axios');

            // Función para inicializar el mapa
            function initMap() {
                // Coordenadas iniciales del mapa
                var initialPosition = {
                    lat: -17.783181,
                    lng: -63.181252
                };



                // Configuración del mapa
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 13,
                    center: initialPosition

                });

                // Variable para almacenar los marcadores
                var markers = [];
                // Hacer la solicitud a la API de reclamos
                fetch('http://localhost:8080/api/reclamos/reclamos', {
                        method: "GET",
                    })
                    .then(response => response.json())
                    .then(json => {
                        // console.log(json.body)
                        // const pinViewBackground = new google.maps.marker.PinView({

                        // });
                        const arrayDeReclamos = json.body
                        arrayDeReclamos.forEach(function(reclamo) {
                            var reclamoLatLng = new google.maps.LatLng(reclamo.posicion[0], reclamo.posicion[1]);


                            if (reclamo.categoria == 'Caminos') {
                                var marker = new google.maps.Marker({
                                position: reclamoLatLng,
                                map: map,
                                title:'Caminos',
                                icon: {
                                    url: "http://maps.google.com/mapfiles/ms/icons/pink-dot.png"
                                }

                            });
                            }
                            if (reclamo.categoria == 'Basura') {
                                var marker = new google.maps.Marker({
                                position: reclamoLatLng,
                                map: map,
                                title:'Basura',
                                icon: {
                                    url: "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png"
                                }
                            });
                            }
                            if (reclamo.categoria == 'Alumbrado') {
                                var marker = new google.maps.Marker({
                                position: reclamoLatLng,
                                map: map,
                                title:'Alumbrado',
                                icon: {
                                    url: "http://maps.google.com/mapfiles/ms/icons/purple-dot.png"
                                }
                            });
                            }


                            // Agregamos el marcador al arreglo de marcadores
                            markers.push(marker);
                        });

                        // Dibujamos el polígono
                        // drawPolygon();
                    })
                    .catch(err => console.log(err));


                /*  axios.get('http://localhost:8080/api/reclamos/reclamos')
                     .then(function(response) {
                         // Obtener los datos de los reclamos de la respuesta
                         var reclamos = response.data;

                         // Iterar sobre los reclamos y agregar marcadores en el mapa
                         reclamos.forEach(function(reclamo) {
                             var reclamoLatLng = new google.maps.LatLng(reclamo.posicion[0], reclamo.posicion[1]);

                             var marker = new google.maps.Marker({
                                 position: reclamoLatLng,
                                 map: map
                             });

                             // Agregamos el marcador al arreglo de marcadores
                             markers.push(marker);
                         });

                         // Dibujamos el polígono
                         drawPolygon();
                     })
                     .catch(function(error) {
                         console.error('Error al obtener los reclamos:', error);
                     }); */


                // Variable para almacenar el polígono
                var polygon = null;

                // Función para dibujar el polígono
                function drawPolygon() {
                    // Si ya hay un polígono, lo eliminamos
                    if (polygon) {
                        polygon.setMap(null);
                    }

                    // Si hay al menos 3 marcadores, dibujamos el polígono
                    if (markers.length >= 3) {
                        var polygonPoints = markers.map(function(marker) {
                            return marker.getPosition();
                        });

                        polygon = new google.maps.Polygon({
                            paths: polygonPoints,
                            strokeColor: '#FF0000',
                            strokeOpacity: 0.8,
                            strokeWeight: 2,
                            fillColor: '#FF0000',
                            fillOpacity: 0.35,
                            map: map
                        });
                    }
                }

                // Evento click en el mapa para agregar marcadores
                const image =
                    "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
                map.addListener('click', function(event) {
                    // Creamos un nuevo marcador en la posición del click
                    var marker = new google.maps.Marker({
                        position: event.latLng,
                        map: map,
                        icon: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
                        // icon: image,
                        size: new google.maps.Size(20, 32),
                        // El origen para esta imagen es (0, 0).
                        origin: new google.maps.Point(0, 0),
                        // El ancla para esa imagen es la base del asta bandera en (0, 32).
                        anchor: new google.maps.Point(0, 32)
                    });

                    // Agregamos el marcador al arreglo de marcadores
                    markers.push(marker);

                    // Dibujamos el polígono
                    drawPolygon();
                });
            }
        </script>
        <!-- Carga la API de Google Maps con tu clave de API -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap"></script>
