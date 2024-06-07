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
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script type="text/javascript">
    let data = @json($data);

    var map = L.map('map').setView([4.624335, -74.063644], 10);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    data.forEach(function(ubicacion) {
        L.marker([ubicacion.longitud / 1000000, ubicacion.latitud / 1000000]).addTo(map)
            .bindPopup(ubicacion.dispositivo);
    });
</script>
@endsection