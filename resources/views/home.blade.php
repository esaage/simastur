<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Gis Pemda</title>
    <link rel="shortcut icon" href="/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""/>

     <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>


    {{-- Tiles / Tema Maps --}}
    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet@3.0.8/dist/esri-leaflet.js"
    integrity="sha512-E0DKVahIg0p1UHR2Kf9NX7x7TUewJb30mxkxEm2qOYTVJObgsAGpEol9F6iK6oefCbkJiA4/i6fnTHzM6H1kEA=="
    crossorigin=""></script>

    <!-- Load Esri Leaflet Vector from CDN -->
    <script src="https://unpkg.com/esri-leaflet-vector@3.1.2/dist/esri-leaflet-vector.js"
    integrity="sha512-SnA/TobYvMdLwGPv48bsO+9ROk7kqKu/tI9TelKQsDe+KZL0TUUWml56TZIMGcpHcVctpaU6Mz4bvboUQDuU3w=="
    crossorigin=""></script>

    <style>
        *{
            font-family: Arial, Helvetica, sans-serif
        }
        #map { height: 700px; }


        #sidebar { 
            position: absolute;
            z-index: 999;
            width: 200px;
            height: 100vh;
            background-color: rgb(192, 192, 192);
        }
        #sidebar ul li {
            list-style: none;
            padding-top: 10px;
            text-decoration: underline;
            cursor: pointer;
        }
        
        #sidebar-kanan { 
            display: none;
            position: absolute;
            z-index: 999;
            width: 250px;
            height: 100vh;
            background-color: rgb(192, 192, 192);
            margin-left: 160vh;
            margin-top: -100vh;
        }
        #sidebar-kanan ul li{
            list-style: none;
        }
        #sidebar-kanan img {
            width: 200px
        }
        </style>
</head>
<body>
    <div id="sidebar">
        <ul>
            <li id="tombol-jalan-ngarengan">Jalan Ngarengan</li>
            <li >Jalan Mogok</li>
            <li>Jalan Mbabatan</li>
            <li id="tombol-jalan-kedungdowo">Jalan Kedungdowo</li>
            <li>Jalan Sidowayah</li>
            <li>Jalan Blembem</li>
        </ul>
    </div>
    <div id="map"></div>

    <div id="sidebar-kanan">
        <h4>Foto Jalan</h4>
        <ul>
            <li>
                <p>Ujung</p>
                <img src="/assets/images/jalan-ujung.jpg" alt="">
            </li>
            <li>
                <p>Pangkal</p>
                <img src="/assets/images/jalan-pangkal.jpg" alt="">
            </li>
        </ul>
    </div>

    <script>
        // init map
        var map = L.map('map').setView([-7.4171998, 111.3191149], 15);

        // init tiles/tema map

        // tiles default
        // var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        //     maxZoom: 18,
        //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
        //         'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        //     id: 'mapbox/streets-v11',
        //     tileSize: 512,
        //     zoomOffset: -1
        // }).addTo(map);


        // tiles esri arcgis
        // L.esri.Vector.vectorBasemapLayer('ArcGIS:Imagery', {
        //     apikey: 'AAPKb10821df102a46a4b930958d7a6a06593sdla7i0cMWoosp7XXlYflDTAxsZMUq-oKvVOaom9B8CokPvJFd-sE88vOQ2B_rC'
        // }).addTo(map);

        // tiles dari google
        // Hybrid: s,h;
        // Satellite: s;
        // Streets: m;
        // Terrain: p;

        L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

        // data tempat
        var data_tempat = [
            {
                'long' : -7.412541, 
                'lat' : 111.318574,
                'kategori' : 'Tempat Wisata',
                'nama' : 'Banyu Rejo Park',
            },
            {
                'long' : -7.416102, 
                'lat' : 111.31147,
                'kategori' : 'Fasilitas Umum',
                'nama' : 'Masjid Darussalam',
            }
        ]

        // marker custom
        var masjid = L.icon({
            iconUrl: 'assets/icons/masjid.png',
            // shadowUrl: 'leaf-shadow.png',
            iconSize:     [20, 24], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            // iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            // popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        var rumah = L.icon({
            iconUrl: 'assets/icons/rumah.png',
            // shadowUrl: 'leaf-shadow.png',
            iconSize:     [20, 24], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            // iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            // popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        // menampilkan data tempat menggunakan marker dan foreach
        data_tempat.forEach(item => {
            var marker = L.marker([item['long'], item['lat']], {icon: item['kategori'] == 'Fasilitas Umum' ? masjid : rumah}).addTo(map)
            .bindPopup('<b>'+item['kategori']+'</b><br/>'+item['nama']).openPopup();
            // disini bisa menampilkan apa saja, baik itu data dari database, gambar dll
        });
        // var marker = L.marker([-7.412541, 111.318574]).addTo(map)
		// .bindPopup('<b>Tempat Wisata</b><br />Banyu Rejo Park.').openPopup();
        
        // var marker = L.marker([-7.416102, 111.31147]).addTo(map)
		// .bindPopup('<b>Fasilitas Umum</b><br/>Masjid Darusalam.').openPopup();
        
        
        var data_tempat = [
            {
                'long' : -7.42073, 
                'lat' : 111.323454,
                'color': 'red',
                'warna': '#f03',
                'opacity': 0.5,
                'radius': 100,
                'nama' : 'Rumahku',
            }
        ]
        data_tempat.forEach(item => {
            var circle = L.circle([item['long'], item['lat']], {
                color: item['color'],
                fillColor: item['warna'],
                fillOpacity: item['opacity'],
                radius: item['radius']
            }).addTo(map).bindPopup(item['nama']);
        });



        // poly line, bisa untuk jalan gesssss
        // create a red polyline from an array of LatLng points
        // coba bikin poly line jalan ngarengan
        var jalan_ngarengan = [
            [-7.414208, 111.315584],
            [-7.414857, 111.316339],
            [-7.415527, 111.317928],
            [-7.419325, 111.322733],
            [-7.42073, 111.323454],
        ];
        var jalan_kedungdowo = [
            [-7.414155, 111.315513],
            [-7.409729, 111.322999],
            [-7.409133, 111.324192],
            [-7.40841, 111.324321],
            [-7.407963, 111.325744],
            [-7.405814, 111.32845],
        ];

        // var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);

        // zoom the map to the polyline
        // map.fitBounds(polyline.getBounds());
    
        var polygon_lapangan = [
            [
                -7.417463571774908,
                111.31002187728882
            ],
            [
                -7.4182827782979235,
                111.31054759025574,
            ],
            [
                -7.417676352836582,
                111.31154537200928,
            ],
            [
                -7.416899701463955,
                111.31103038787842,
            ],
            [
                -7.417463571774908,
                111.31002187728882,
            ]
        ]

        var polygon_bengkok = [
            [
                -7.4148995518938605,
                111.31651550531386,
            ],
            [
                -7.415346394607454,
                111.31629019975662,
            ],
            [
                -7.415787917319441,
                111.31604343652725,
            ],
            [
                -7.41613368780879,
                111.31564378738403,
            ],
            [
                -7.416601807423135,
                111.315096616745,
            ],
            [
                -7.416990133543593,
                111.31589591503143,
            ],
            [
                -7.417394417907707,
                111.31668448448181,
            ],
            [
                -7.416841186578982,
                111.31704390048981,
            ],
            [
                -7.416702878638151,
                111.31708681583405,
            ],
            [
                -7.416234759131296,
                111.31741404533386,
            ],
            [
                -7.416053894643049,
                111.31749987602232,
            ],
            [
                -7.415809195511243,
                111.31766080856322,
            ],
            [
                -7.415532578937592,
                111.3179075717926,
            ],
            [
                -7.4148995518938605,
                111.31651550531386,
            ]
        ]

        var polygon_sawahku = [
            [
                -7.415833133475802,
                111.31874442100525,
            ],
            [
                -7.416194862559392,
                111.31872564554214,
            ],
            [
                -7.416891722161905,
                111.31870955228804,
            ],
            [
                -7.416918319834796,
                111.31875783205032,
            ],
            [
                -7.4169316186706435,
                111.31893217563628,
            ],
            [
                -7.416306572951616,
                111.31898313760757,
            ],
            [
                -7.415787917319441,
                111.31905019283295,
            ],
            [
                -7.415833133475802,
                111.31874442100525,
            ]
        ]
    
	var polygon = L.polygon(polygon_lapangan).addTo(map).bindPopup('Ini lapangan kedunggalar.');

    polygon.setStyle({
        color : 'green',
        fillColor : 'green',
        weight : 2
    })

    // var polygon = L.polygon(polygon_bengkok, {color:'blue', weight:2}).addTo(map).bindPopup('Ini sawah bengkok.');
    // var polygon = L.polygon(polygon_sawahku, {color:'red', weight:2}).addTo(map).bindPopup('Ini sawahku.');

	var popup = L.popup()
		.setLatLng([-7.42073, 111.323454])
		.setContent('Ini rumahku.')
		.openOn(map);

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent('Kamu ngeklik di titik koordinat ' + e.latlng.toString())
			.openOn(map);
	}

	map.on('click', onMapClick);


    var msg_hthml = "<h3>Jalan Ngarengan</h3> <h4>01 208 - Kecamatan Kedunggalar</h4><h4>Panjang Kerusakan : 1 Km</h4>"
    document.getElementById('tombol-jalan-ngarengan').addEventListener('click', function(){
       ngarengan =  L.polyline(jalan_ngarengan, {color: 'red'}).addTo(map)
        popup
			.setLatLng(jalan_ngarengan[0])
			.setContent(msg_hthml)
			.openOn(map);

        // show gambar 
        document.getElementById('sidebar-kanan').style.display = 'block'
    });
    document.getElementById('tombol-jalan-kedungdowo').addEventListener('click', function(){

        dungdowo = L.polyline(jalan_kedungdowo, {color: 'red'}).addTo(map)
    });

    // menghapus line
    // map.removeLayer(line)
    

    </script>
    
</body>
</html>