@extends('template.layout')

@section('content')
    <section class="pt-4">
        <div class="container-fluid">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('polygons.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="mb-3">
                                    <label for="place" class="form-label">GeoJSON</label>
                                    <input type="file" name="geojson" class="form-control" id="geojson">
                                </div>
                                <div class="legend mb-3">
                                    <button type="submit" class="btn btn-primary btn-block btn-fill">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div id="map" style="height:500px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Set Map View
        var map = L.map('map').setView([-6.5976236, 106.7973811], 15);

        // Map Layer
        var Stadia_AlidadeSmoothDark = L.tileLayer(
            'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
                maxZoom: 20,
                attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
            });

        var Stamen_Toner = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner/{z}/{x}/{y}{r}.{ext}', {
            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            subdomains: 'abcd',
            minZoom: 0,
            maxZoom: 20,
            ext: 'png'
        });

        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Marker Layer
        var places_Array = [];
        for (const places of <?= json_encode($dots) ?>) {
            var place = L.marker([places.longitude, places.latitude]).bindPopup(places.place);
            places_Array.push(place);
        }
        var marker = L.layerGroup(places_Array);
        console.log(marker);

        var polygons_Array = [];
        for (var polygons of <?= json_encode($geojsons); ?>) {
            var geojsonFeature = polygons
            polygons_Array.push(L.geoJSON(geojsonFeature));
        }
        var polygon = L.layerGroup(polygons_Array);


        // Layer Options
        var baseLayers = {
            "OpenStreetMap": osm,
            "Dark Map": Stadia_AlidadeSmoothDark,
            "Stamen Toner Map": Stamen_Toner
        };

        var overlays = {
            "Marker": marker,
            "Polygon": polygon
        };
        console.log(overlays);

        L.control.layers(baseLayers, overlays).addTo(map);
    </script>
@endsection
