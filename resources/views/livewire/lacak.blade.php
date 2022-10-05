<div>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pelacakan </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pelacakan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label>Cari Anggota</label>
              <select class="form-control" wire:model="anggota" style="width: 100%;">
                <option selected hidden>-- Pilih Anggota --</option>
                @foreach ($dataAnggota as $row)
                  <option value="{{ $row->getKey() }}">{{ $row->nama }}</option>
                @endforeach
              </select>
            </div>
            <hr>
            <div class="row">
              <div class="col">
                <div id="map" style="width: 100%; height: 400px;" wire:ignore></div>
              </div>
              <div class="col-2 overflow-auto" style="height: 400px">
                <h6>Log :</h6>
                <ol>
                  @if ($data)
                    @foreach ($data->pelacakan as $row)
                      <small>
                        <li>{{ $row->created_at }}</li>
                      </small>
                    @endforeach
                  @endif
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkKASLf8jHi7p6dr-wD9YPGhCvHrHW65w&callback=initMap" async
      defer></script>
    <script type="text/javascript">
      var map;

      // Cretes the map
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: new google.maps.LatLng(-8.593821405005185, 16.52170020021885),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
      }

      Livewire.on('koordinat', data => {
        generateMarkers(data);
      });

      function generateMarkers(locations) {
        const flightPath = new google.maps.Polyline({
          path: locations,
          geodesic: true,
          strokeColor: "#FF0000",
          strokeOpacity: 1.0,
          strokeWeight: 2,
        });

        flightPath.setMap(map);
        zoomToObject(flightPath);
      }

      function zoomToObject(obj) {
        var bounds = new google.maps.LatLngBounds();
        var points = obj.getPath().getArray();
        for (var n = 0; n < points.length; n++) {
          bounds.extend(points[n]);
        }
        map.fitBounds(bounds);
      }
    </script>
  @endpush
</div>
