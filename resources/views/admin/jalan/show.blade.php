@extends('layout.back.index')
@section('title', 'Master Data Jalan')

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xs-12">
            
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">{{ $data->nomor_ruas }} - {{ $data->nama_ruas }}</h3>

              <p class="text-muted text-center">{{ strtoupper($data->kecamatan->nama) }}</p>

              <div class="row">
                <div class="col-md-6">
                  <h4 class="text-center">Ukuran Jalan</h4>
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Panjang Ruas</b> <a class="pull-right">{{ $data->panjang_ruas }} Km</a>
                    </li>
                    <li class="list-group-item">
                      <b>Lebar Ruas</b> <a class="pull-right">{{ $data->lebar_ruas }} Km</a>
                    </li>
                  </ul>
                  <h4 class="text-center">Struktur Jalan</h4>
                  <ul class="list-group list-group-unbordered">
                    @foreach ($data->struktur as $item)
                        @if ($item->jenis == 'hotmix')
                          <li class="list-group-item">
                            <b>Hotmix</b> <a class="pull-right">{{ $item->panjang }} Km</a>
                          </li>
                        @elseif ($item->jenis == 'penetrasi_makadam')
                          <li class="list-group-item">
                            <b>Aspal/Penetrasi/Makadam</b> <a class="pull-right">{{ $item->panjang }} Km</a>
                          </li>
                        @elseif ($item->jenis == 'perkerasan_beton')
                          <li class="list-group-item">
                            <b>Perkerasan Beton</b> <a class="pull-right">{{ $item->panjang }} Km</a>
                          </li>
                        @elseif ($item->jenis == 'kerikil')
                          <li class="list-group-item">
                            <b>Telford/Kerikil</b> <a class="pull-right">{{ $item->panjang }} Km</a>
                          </li>
                        @elseif ($item->jenis == 'tanah')
                          <li class="list-group-item">
                            <b>Tanah</b> <a class="pull-right">{{ $item->panjang }} Km</a>
                          </li>
                        @endif
                    @endforeach
                  </ul>
                </div>
                <div class="col-md-6">
                  <h4 class="text-center">Detail Jalan</h4>
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>LHR</b> <a class="pull-right">{{ $data->lhr }} Km</a>
                    </li>
                    <li class="list-group-item">
                      <b>Akses</b> <a class="pull-right">{{ $data->akses }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Keterangan</b> <a class="pull-right">{{ $data->keterangan }}</a>
                    </li>
                  </ul>
                  <h4 class="text-center">Kondisi Jalan</h4>
                  <ul class="list-group list-group-unbordered">
                    @foreach ($data->kondisi as $item)
                    @if ($item->kondisi == 'baik')
                      <li class="list-group-item">
                        <b>Baik</b> <a class="pull-right">{{ $item->panjang }} Km - {{ $item->persentase }}%</a>
                      </li>
                      @elseif($item->kondisi == 'sedang')
                      <li class="list-group-item">
                        <b>Sedang</b> <a class="pull-right">{{ $item->panjang }} Km - {{ $item->persentase }}%</a>
                      </li>
                      @elseif($item->kondisi == 'rusak ringan')
                      <li class="list-group-item">
                        <b>Rusak Ringan</b> <a class="pull-right">{{ $item->panjang }} Km - {{ $item->persentase }}%</a>
                      </li>
                      @elseif($item->kondisi == 'rusak berat')
                      <li class="list-group-item">
                        <b>Rusak Berat</b> <a class="pull-right">{{ $item->panjang }} Km - {{ $item->persentase }}%</a>
                      </li>
                    @endif
                    @endforeach
                  </ul>
                    {{-- <div class="box box-default">
                      <div class="box-header with-border">
                      </div>
                      
                      <div class="box-body">
                        <div class="row">
                          <div class="col-md-8">
                            <div class="chart-responsive">
                              {{-- <canvas id="pieChart" style="height:250px"></canvas> --}}
                              {{-- <div id="donut-chart" style="height: 150px;"></div> --}}
                            {{-- </div>
                            
                          </div>
                          
                          <div class="col-md-4">
                            <ul class="chart-legend clearfix">
                              <li><i class="fa fa-circle-o text-green"></i> Baik</li>
                              <li><i class="fa fa-circle-o text-light-blue"></i> Sedang</li>
                              <li><i class="fa fa-circle-o text-yellow"></i> Rusak Ringan</li>
                              <li><i class="fa fa-circle-o text-red"></i> Rusak Berat</li>
                            </ul>
                          </div>
                          
                        </div>
                        
                      </div>
                    </div>  --}}
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label class="text-center">Foto Ujung</label>
                  <img src="/assets/images/jalan-pangkal.jpg" alt="" class="img-responsive">
                </div>
                <div class="col-md-6">
                  <label class="text-center">Foto Pangkal</label>
                  <img src="/assets/images/jalan-ujung.jpg" alt="" class="img-responsive">
                </div>
              </div>
              
              <label >Lokasi Jalan</label>
              <div id="map" style="height: 300px; width:100%; border:1px solid rgba(90, 90, 90, 0.322); border-radius:10px">
            </div>
            <!-- /.box-body -->
          </div>

        </div>
    </div>
@endsection

@section('css')
    <!-- DataTables -->
  <link rel="stylesheet" href="/assets/layout/datatables.net-bs/css/dataTables.bootstrap.min.css">
  {{-- leaflet --}}
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""/>
@endsection
@section('js')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
crossorigin=""></script>
<!-- page script -->
<script>

  // koordinat jalan
  var koordinat_ujung = [ <?php echo $data->koordinat[0]->latitude ?>,<?php echo $data->koordinat[0]->longitude ?>]
  var koordinat_pangkal = [ <?php echo $data->koordinat[1]->latitude ?>,<?php echo $data->koordinat[1]->longitude ?>]
  
  // leaflet
  var map = L.map('map').setView(koordinat_ujung, 13);

  // Zoom Control
  map.removeControl(map.zoomControl);

  L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
      maxZoom: 20,
      subdomains:['mt0','mt1','mt2','mt3']
  }).addTo(map);

   // memanggil file geojson yg berisi data data lokasi berbentuk polygn
   fetch('/assets/geojson/jalan.geojson')
        .then(response => response.json())
        .then(data => {

            // menampilkan jalan yg ada dalan file geojson dengan menggunakan sintaks geojson
            // L.geoJSON(data, {
            //   style: function (feature) {
            //       return {color: 'red'};
            //   },
            // })

            // icon marker ujung dan pangkal jalan
            var markerIcon = L.icon({
              iconUrl: '/assets/icons/jalan.png',
              iconSize: [40, 40],
              iconAnchor: [20, 40],
              popupAnchor: [20, 10],
          });

            // menampilkan marker pada ujung dan pangkal jalan
            // L.marker(koordinat_ujung, { icon : markerIcon }).addTo(map)
            // .bindPopup('Ujung')
            // .openPopup();
            // L.marker(koordinat_pangkal, { icon : markerIcon }).addTo(map)
            // .bindPopup('Pangkal')
            L.marker(koordinat_ujung).addTo(map)
            .bindPopup('Ujung')
            .openPopup();
            L.marker(koordinat_pangkal).addTo(map)
            .bindPopup('Pangkal')
            // .openPopup();
        });   

   
</script>
@endsection