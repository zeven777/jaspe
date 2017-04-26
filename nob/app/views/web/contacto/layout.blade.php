@extends('web.main.layout')
@section('content')
@if( $contact )
        <aside class="banner contacto">

            <h1>
                {{ HTML::cleanHtml($contact->titulo, 'p') }}
            </h1>

        </aside>

        <section class="main contacto">

            <div class="container">

                <div class="col-md-10 text-center center-block info">

                    {{ HTML::decode($contact->contenido) }}

                </div>

                <div class="mision col-md-12 center-block">

                    <div class="col-md-6 imgs izq">

                        <picture>

                            <source srcset="{{ $contact->image->getUrlRetinableImages(1) }}" />

                            <img src="{{ $contact->image->getImage(1) }}" alt="Jaspe"/>

                        </picture>

                    </div>

                    <div class="col-md-6 imgs der">

                        <div class="mapa">

                            <div id="map-canvas"></div>

                        </div>

                    </div>

                </div>

                <div class="clearfix"></div>

                <div class="col-md-8 center-block text-center info2">

                    <h2 class="h1">{{
                        p_system('contacto_gerentes_titulo', $lang)
                    }}</h2>

                </div>

@if( $staff->count() > 0 )
                <div id="distribuidor" class="clearfix"></div>

                @include('web.contacto.section.staff')

@endif
            </div>

        </section>

@endif
@stop
@section('script')
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&language={{
        $lang
    }}&key={{ p_config('api.google.maps.key') }}"></script>
    <style>
        .mapa {
            display: block;
            width: 680px;
            height:480px;
        }
        #map-canvas {
            width: 100%;
            height: 100%;
        }
    </style>
    <script>
        var googleMapsInitialized = false;
        var marker;
        var latLng;
        var map;
        var image;
        var geocoder;
        function initialize() {
            if(googleMapsInitialized) return;
            geocoder = new google.maps.Geocoder();
            latLng = new google.maps.LatLng({{
                $contact->latitude ?: 10
            }},{{
                $contact->longitude ?: -65
            }});
            map = new google.maps.Map(document.getElementById('map-canvas'), {
                center: latLng,
                zoom: {{
                    $contact->zoom ?: 8
                }},
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                    mapTypeIds: [
                        google.maps.MapTypeId.ROADMAP,
                        google.maps.MapTypeId.SATELLITE
                    ]
                }
            });
            image = {
                url: "{{ url('img/map-jaspe.png') }}",
                size: new google.maps.Size(51, 51),
                origin: new google.maps.Point(0,0),
                anchor: new google.maps.Point(26,26)
            };
            marker = new google.maps.Marker({
                map: map,
                draggable: false,
                position: latLng,
                icon: image
            });

            googleMapsInitialized = true;
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@stop