                    {{ NobForm::hidden('latitude', null, ['id' => 'idLatitude']) }}
                    {{ NobForm::hidden('longitude', null, ['id' => 'idLongitude']) }}
                    {{ NobForm::hidden('zoom', null, ['id' => 'idZoom']) }}
                    <input id="pac-input" class="form-control" type="text" placeholder="{{ trans('admin::admin.labels.form.maps.search') }}">
                    <div class="embed-responsive embed-responsive-16by9">
                        <div id="map-canvas" class="embed-responsive-item"></div>
                    </div>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&language={{
    $language }}&key={{
    p_config('api.google.maps.key')
}}"></script>
<script>
function initialize() {
    var markers = [];
    var marker;

    var map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: new google.maps.LatLng({{
            $model->latitude ?: p_schema("{$form}.setup.map_center.latitude") }},{{
            $model->longitude ?: p_schema("{$form}.setup.map_center.longitude") }}),
        zoom: {{ $model->zoom ?: p_schema("{$form}.setup.map_center.zoom") }},
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var image = {
        url: "{{ url(p_schema("{$form}.fields.{$name}.setup.icon")) }}",
        size: new google.maps.Size({{
            p_schema("{$form}.fields.{$name}.setup.size.w") }}, {{
            p_schema("{$form}.fields.{$name}.setup.size.h") }}),
        origin: new google.maps.Point(0,0),
        anchor: new google.maps.Point({{
            p_schema("{$form}.fields.{$name}.setup.center.w") }},{{
            p_schema("{$form}.fields.{$name}.setup.center.h") }})
    };

    var markerSetup = {
        map: map,
        icon: image
    };

    var input = document.getElementById('pac-input');

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var searchBox = new google.maps.places.SearchBox((input));

    google.maps.event.addListener(searchBox, 'places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }

        for (var i = 0, marker; marker = markers[i]; i++) {
            marker.setMap(null);
        }

        markers = [];

        var bounds = new google.maps.LatLngBounds();

        if(places.length > 0) {
            var place = places[0];

            marker = new google.maps.Marker(markerSetup);
            marker.setPosition(place.geometry.location);
            marker.setTitle(place.name);
            marker.setDraggable(true);

            $('#idLatitude').val(marker.getPosition().lat());
            $('#idLongitude').val(marker.getPosition().lng());
            $('#idZoom').val(map.getZoom());

            google.maps.event.addListener(marker, "dragend", function() {
                $('#idLatitude').val(marker.getPosition().lat());
                $('#idLongitude').val(marker.getPosition().lng());
                $('#idZoom').val(map.getZoom());
            });

            markers.push(marker);

            bounds.extend(place.geometry.location);
        }

        map.fitBounds(bounds);
    });
    google.maps.event.addListener(map, 'bounds_changed', function() {
        var bounds = map.getBounds();
        searchBox.setBounds(bounds);
    });
    google.maps.event.addListener(map, "zoom_changed", function() {
        $('#idZoom').val(map.getZoom());
    });
@if( $model->latitude || Input::old('latitude'))
    var latlng = new google.maps.LatLng({{
        $model->latitude ?: Input::old('latitude') }}, {{
        $model->longitude ?: Input::old('longitude') }});

    marker = new google.maps.Marker(markerSetup);
    marker.setPosition(latlng);
    marker.setDraggable(true);

    google.maps.event.addListener(marker, "dragend", function() {
        $('#idLatitude').val(marker.getPosition().lat());
        $('#idLongitude').val(marker.getPosition().lng());
        $('#idZoom').val(map.getZoom());
    });

    markers.push(marker);

    map.panTo(latlng);
    map.setCenter(latlng);
    map.setZoom({{ $model->zoom ?: Input::old('zoom') }});
@elseif( p_schema("{$form}.setup.map_center.visible") )
    var latlng = new google.maps.LatLng({{
        p_schema("{$form}.setup.map_center.latitude") }},{{
        p_schema("{$form}.setup.map_center.longitude") }});

    marker = new google.maps.Marker(markerSetup);
    marker.setPosition(latlng);
    marker.setDraggable(true);

    google.maps.event.addListener(marker, "dragend", function() {
        $('#idLatitude').val(marker.getPosition().lat());
        $('#idLongitude').val(marker.getPosition().lng());
        $('#idZoom').val(map.getZoom());
    });

    markers.push(marker);
    map.setZoom({{ p_schema("{$form}.setup.map_center.zoom") }});
@endif
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>