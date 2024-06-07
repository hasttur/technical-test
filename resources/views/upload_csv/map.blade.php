@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card" style="height: 600px;">
        <div class="card-header text-center">Mapa con datos</div>
        <div class="card-body " id="map">
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    let map;

   

    async function initMap() {
        const position = {
            lat: 4.624335,
            lng: -74.063644
        };
        const {
            Map
        } = await google.maps.importLibrary("maps");
        const {
            AdvancedMarkerElement
        } = await google.maps.importLibrary("marker");

        map = new Map(document.getElementById("map"), {
            zoom: 10,
            center: position,
            mapId: "DEMO_MAP_ID",
        });

        const marker = new AdvancedMarkerElement({
            map: map,
            position: position,
            title: "Uluru",
        });
    }

    initMap();
</script>
@endsection