@extends('layout.front.index')
@section('title', 'Jelajah')
    
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""/>
    <style>
        .leaflet-control-attribution {
            display: none;
        }
        #map { height: 87vh; }
    
        .legend-kategori-lokasi{
            padding: 10px;
            background: white;
        }
        
        .sidebar-layer {
            position: absolute;
            top: 7rem;
            left: 0;
            z-index: 9999;
            width: 280px;
            max-height: 500px;
        }
        .button-close-modal {
          text-decoration: none;
          float: right;
          font-weight: bold;
          color: black
        }
        .modal-detail-layer {
          display: none; 
          position: absolute; 
          right:0; 
          top: 7rem; 
          z-index:99999; 
          background:white; 
          padding:10px; 
          height:600px;
          width : 350px;
        }
     </style>
@endsection
@section('js')
    
@endsection
@section('content')
<div class="flex-shrink-0 p-3 bg-white sidebar-layer overflow-auto">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
      <svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      <h5>Daftar Layer</h5>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#jalan-collapse" aria-expanded="true">
          <h5>Jalan</h5>
        </button>
        <div class="collapse show" id="jalan-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            @foreach ($jalan as $item)
              <li><input type="checkbox" id="jalan{{ $item->id }}" class="checkbox-jalan"  oninput="cariJalan(this.value)" value="{{ $item->id }}"> {{ $item->nama_ujung_ruas }}</li>
            @endforeach
          </ul>
        </div>
      </li>
      {{-- <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#sungai-collapse" aria-expanded="true">
          <h5>Irigasi</h5>
        </button>
        <div class="collapse show" id="sungai-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><input type="checkbox" id="irigasi" value="1"> Brantas</li>
            <li><input type="checkbox" id="irigasi" value="1"> Kedunggalar</li>
            <li><input type="checkbox" id="irigasi" value="1"> Katikan</li>
          </ul>
        </div>
      </li> --}}
     
    </ul>
  </div>
  <div id="modal" class="overflow-auto modal-detail-layer">
    {{-- content dari modal di isikan lewat js saat user mengeklik layer --}}
  </div>

    <div id="map"></div>


    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>
    <script>
        var map = L.map('map').setView([-7.416772, 111.315365], 11);

        // Zoom Control
        map.removeControl(map.zoomControl);
        // map.addControl(L.control.zoom({ position: 'bottomleft' }));

        // tiles dari google
        // Hybrid: s,h;
        // Satellite: s;
        // Streets: m;
        // Terrain: p;

        L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);


        // Init variabel global untuk menampilkan modal foto lokasi ketika dipilih
        var modal = document.getElementById('modal')
        var foto1 = document.getElementById('foto1')
        var foto2 = document.getElementById('foto2')
        // Init variable global untuk layer jalan
        var layerJalan;
        // memanggil file geojson yg berisi data data lokasi berbentuk polygn
        fetch('/assets/geojson/jalan.geojson')
        .then(response => response.json())
        .then(data => {

            // menampilkan layer jalan yg ada dalan file geojson dengan menggunakan sintaks geojson
            // jadi nanti ketika layer jalan diaktifkan/dinonaktifkan, tinggal remove/init layer ini saja
            layerJalan = L.geoJSON(data, {
                style: function (feature) {
                    return {
                        color: 'red', weight:2, 

                    };
                    // return {color: feature.properties.color, weight:2, };
                },
                // biar pas layer(nama jalan diklik, lgsg menyorot ke lokasi jalan di peta)
                onEachFeature: function( feature, layer) {

                    // ketika layer/object diklik
                    layer.on('click', function(feature) {

                        // get API dari back end
                        // fetch(`/maps/jalan/${feature.properties.id}`)
                        // .then(response => response.json())
                        // .then(detail => {
                            // console.log(detail);
                            
                            // htmlPopup = `<h2>${detail.nama_pangkal_ruas}</h2>
                            // <h4>${detail.kecamatan}</h4>
                            // <h4>${detail.panjang_kerusakan}</h4>
                            // <img src="/assets/images/${detail.gambar}" height="120px">
                            // `
                                         
                            L.popup()
                            .setLatLng(layer.getBounds().getCenter())
                            .setContent('ini pop up ' + layer.feature.properties.id)
                            .openOn(map)
                        // })

                    });
                    layer.addTo(map)




                },


            });

            // geolayer.addTo(map)
            
        });   

        // Cari Layer Jalan
        function cariJalan(id) {

          layerJalan.eachLayer(function(layer) {

            layer.setStyle({
              color : 'red', 
              weight:2,
            })

            if( layer.feature.properties.id == id ) {

              // mengarahkan map ke layer yg dipilih
              map.flyTo(layer.getBounds().getCenter(), 15)

              layer.setStyle({
                color:'#00a8ff',
                weight: 5,
              })

              // get data jalan dari database
              fetch('/maps/jalan/'+id)
              .then(response => response.json())
              .then(data => {
                console.log(data);
                // menampilakn modal
                // foto1.src = '/assets/images/'+data.gambar
                // foto2.src = '/assets/images/jalan-pangkal.jpg'
                modal.style.display = 'block'

                modal.innerHTML = `
                <a href="#" onclick="document.getElementById('modal').style.display='none'" class="button-close-modal">X</a>
                <h4>Detail Lokasi</h4>
                
                  <table>
                    <tr>
                      <td>Nomor Urut </td>
                      <td>:</td>
                      <td id="jalan_nomor_urut">${data.nomor_urut}</td>
                    </tr>
                    <tr>
                      <td>Nomor Ruas </td>
                      <td>:</td>
                      <td id="jalan_nomor_ruas">${data.nomor_ruas}</td>
                    </tr>
                    <tr>
                      <td>Nama Pangkal Ruas </td>
                      <td>:</td>
                      <td id="jalan_nama_pangkal_ruas">${data.nama_pangkal_ruas}</td>
                    </tr>
                    <tr>
                      <td>Nama Ujung Ruas </td>
                      <td>:</td>
                      <td id="jalan_nama_ujung_ruas">${data.nama_ujung_ruas}</td>
                    </tr>
                    <tr>
                      <td>Titik Pengenal Pangkal </td>
                      <td>:</td>
                      <td id="jalan_titik_pengenal_pangkal">${data.titik_pengenal_pangkal}</td>
                    </tr>
                    <tr>
                      <td>Titik Pengenal Ujung</td>
                      <td>:</td>
                      <td id="jalan_titik_pengenal_ujung">${data.titik_pengenal_ujung}</td>
                    </tr>
                    <tr>
                      <td>Panjang Ruas</td>
                      <td>:</td>
                      <td id="jalan_panjang_ruas">${data.panjang_ruas}</td>
                    </tr>
                    <tr>
                      <td>Klasifikasi Ruas</td>
                      <td>:</td>
                      <td id="jalan_klasifikasi_ruas">${data.klasifikasi_ruas}</td>
                    </tr>
                    <tr>
                      <td>Kode Status Adm</td>
                      <td>:</td>
                      <td id="jalan_kode_status_adm">${data.kode_status_adm}</td>
                    </tr>
                    <tr>
                      <td>Panjang Km Awal</td>
                      <td>:</td>
                      <td id="jalan_panjang_km_awal">${data.panjang_km_awal}</td>
                    </tr>
                    <tr>
                      <td>Panjang Km Akhir</td>
                      <td>:</td>
                      <td id="jalan_panjang_km_akhir">${data.panjang_km_akhir}</td>
                    </tr>
                    <tr>
                      <td>Kecamatan</td>
                      <td>:</td>
                      <td id="jalan_kecamatan">${data.kecamatan}</td>
                    </tr>
                    <tr>
                      <td>Panjang Kerusakan</td>
                      <td>:</td>
                      <td id="jalan_panjang_kerusakan">${data.panjang_kerusakan} Km</td>
                    </tr>
                  </table>
                  <ul class=" list-unstyled fw-normal pb-1 small p-2">
                    <li>
                      Foto Pangkal : <br>
                      <img  id="foto1" src="/assets/images/${data.gambar}" alt="Foto Lokasi" height="200px">
                    </li>
                    <li>
                      Foto Ujung : <br>
                      <img id="foto2" src="/assets/images/jalan-pangkal.jpg" alt="Foto Lokasi" height="200px">
                    </li>
                  </ul>
                `

              })
              

            }
          })

          // unselect checkbox sebelumnya
          var checkbox_jalan = document.querySelectorAll('.checkbox-jalan')
          checkbox_jalan.forEach(item => {
            
            item.checked = false

          })
          document.getElementById('jalan'+id).checked = true

        }


        // Legend untuk menampilkan menu ganti tiles peta
        var legendChangeTiles = L.control({position:'bottomleft'})

        legendChangeTiles.onAdd = function (map) {

        
        var divLegend = L.DomUtil.create('div','legend-kategori-lokasi')

        divLegend.innerHTML = `
        <select id="change-tiles" class="form-control" onchange="changeTiles(this.value)">
          <option>Pilih Tema Peta</option>
          <option value="s,h">Hybrid</option>
          <option value="s">Satellite</option>
          <option value="m">Streets</option>
          <option value="p">Terrain</option>
        </select>
        `
        return divLegend
    }
    legendChangeTiles.addTo(map)


    function changeTiles(tiles) {

      L.tileLayer('http://{s}.google.com/vt/lyrs='+tiles+'&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

    }
    </script>
@endsection




    


    