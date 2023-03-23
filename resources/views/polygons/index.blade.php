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
        var map = L.map('map').setView([42.09618442380296, -71.5045166015625], 8);

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


        // Polygon Layer
        var shpfile = new L.Shapefile('{{ asset('geojsons/' . $geojsons['geojson']) }}', {
			onEachFeature: function(feature, layer) {
				if (feature.properties) {
					layer.bindPopup(Object.keys(feature.properties).map(function(k) {
						return k + ": " + feature.properties[k];
					}).join("<br />"), {
						maxHeight: 200
					});
				}
			}
		});
        shpfile.addTo(map);

    </script>
@endsection
