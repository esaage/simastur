<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Gis Pemda Ngawi</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""/>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin=""></script>
    <script src="/assets/js/leaflet.textpath.js"></script>

    <style>
        #map { height: 650px; }

        .div-icon {
            color: white;
        }

        .legend{
            background: white;
            padding: 10px;  
        }
    </style>
</head>
<body>
    <p>Cari jalan</p>
    <select id="pilih-jalan" onchange="cariJalan(this.value)">
        <option selected disabled>Pilih jalan</option>
        @foreach ($data as $item)
            <option value="{{ $item->id }}">{{ $item->nama_pangkal_ruas }}</option>
        @endforeach
    </select>

    <div id="map"></div>

    <script>
        var map = L.map('map').setView([-7.416772, 111.315365], 16);

        // tiles dari google
        // Hybrid: s,h;
        // Satellite: s;
        // Streets: m;
        // Terrain: p;

        L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

        var geolayer
        // memanggil file geojson batas kecamatan
        fetch('/assets/geojson/batas-kecamatan.geojson')
        .then(response => response.json())
        .then(data => {

            L.geoJSON(data, {
                style : function () {
                    return {
                        color : 'red',
                        dashArray : '30 10',
                        lineCap : 'square',
                        fillOpacity : 0,
                    }
                },
                // onEachFeature: function( feature, layer) {
                //     layer.on('click', () => {
                //         L.popup()
                //         .setLatLng(layer.getBounds().getCenter())
                //         .setContent('Kamu ngeklik di daerah kecamatan kedunggalar')
                //         .openOn(map)
                //     })
                // }
            }).addTo(map)
        })
          
        
        // memanggil file geojson yg berisi data data lokasi berbentuk polygn
        fetch('/assets/geojson/polygon.geojson')
        .then(response => response.json())
        .then(data => {

            // menampilkan object apapun yg ada dalan file geojson dengan menggunakan sintaks geojson
            L.geoJSON(data, {
                style: function (feature) {
                    return {
                        color: 'red', weight:2, 
                        dashArray : "30 10",
                        lineCap : "square",
                        fillOpacity : 0,
                    };
                    // return {color: feature.properties.color, weight:2, };
                },
                // biar pas layer(nama jalan diklik, lgsg menyorot ke lokasi jalan di peta)
                onEachFeature: function( feature, layer) {

                    // icon marker berbentuk html
                    var divIcon = L.divIcon({
                        className: 'div-icon',
                        html: `<b>${feature.properties.nama}</b>`,
                        iconSize: [100,20],
                    });
                    // getBounds() = cari lokasi tengah, getCenter = cari long lat
                    L.marker(layer.getBounds().getCenter(), {icon: divIcon}).addTo(map);
                    layer.setText(feature.properties.nama); // set text pada ujung jalan

                    // ketika layer/object diklik
                    layer.on('click', function() {

                        // get API dari back end
                        fetch(`/maps/jalan/${feature.properties.id}`)
                        .then(response => response.json())
                        .then(detail => {
                            console.log(detail);
                            
                            htmlPopup = `<h2>${detail.nama_pangkal_ruas}</h2>
                            <h4>${detail.kecamatan}</h4>
                            <h4>${detail.panjang_kerusakan}</h4>
                            <img src="/assets/images/${detail.gambar}" height="120px">
                            `
                                         
                            L.popup()
                            .setLatLng(layer.getBounds().getCenter())
                            .setContent(htmlPopup)
                            .openOn(map)
                        })

                    })
                    
                    
                    layer.addTo(map)

                },


            });
            
        });        

        // memanggil file geojson yg berisi data data lokasi berbentuk polygn
        fetch('/assets/geojson/jalan-dummy.geojson')
        .then(response => response.json())
        .then(data => {

            // menampilkan object apapun yg ada dalan file geojson dengan menggunakan sintaks geojson
            geolayer = L.geoJSON(data, {
                style: function (feature) {
                    return {
                        color: 'red', weight:2, 

                    };
                    // return {color: feature.properties.color, weight:2, };
                },
                // biar pas layer(nama jalan diklik, lgsg menyorot ke lokasi jalan di peta)
                onEachFeature: function( feature, layer) {

                    // icon marker berbentuk html
                    // var divIcon = L.divIcon({
                    //     className: 'div-icon',
                    //     html: `<b>${feature.properties.nama}</b>`,
                    //     iconSize: [100,20],
                    // });
                    // // getBounds() = cari lokasi tengah, getCenter = cari long lat
                    // L.marker(layer.getBounds().getCenter(), {icon: divIcon}).addTo(map);
                    // layer.setText(feature.properties.nama); // set text pada ujung jalan

                    // ketika layer/object diklik
                    layer.on('click', function() {

                        // get API dari back end
                        fetch(`/maps/jalan/${feature.properties.id}`)
                        .then(response => response.json())
                        .then(detail => {
                            console.log(detail);
                            
                            htmlPopup = `<h2>${detail.nama_pangkal_ruas}</h2>
                            <h4>${detail.kecamatan}</h4>
                            <h4>${detail.panjang_kerusakan}</h4>
                            <img src="/assets/images/${detail.gambar}" height="120px">
                            `
                                         
                            L.popup()
                            .setLatLng(layer.getBounds().getCenter())
                            .setContent(htmlPopup)
                            .openOn(map)
                        })

                    })


                    layer.addTo(map)


                },


            });
            
        });        
        
        
        
        // function cari jalan/layer lalu zoom di peta
        function cariJalan(id) {
            

            geolayer.eachLayer( function(layer) {

                if( layer.feature.properties.id == id) {
                    map.flyTo(layer.getBounds().getCenter(), 17)
                    L.popup()
                            .setLatLng(layer.getBounds().getCenter())
                            .setContent('kamu ngeklik jalan '+ layer.feature.properties.nama)
                            .openOn(map)
                }
            })
            
        }

        // legend
        var legend = L.control({position:'bottomright'})

        legend.onAdd = function (map) {

        
        var divLegend = L.DomUtil.create('div','legend')

        labels = ['<strong>Keterangan : </strong>']
        categories = ['Jalan','Sungai','TPU']

        for (let i = 0; i < categories.length; i++) {
            
            if ( i==0 ) {
                divLegend.innerHTML += labels.push(
                    '<img src="/assets/icons/jalan.png" width="20" height="23"><i class="circle">'+categories[i]+'</i>');

            } else if ( i==1) {
                divLegend.innerHTML += labels.push(
                    '<img src="/assets/icons/sungai.png" width="20" height="23"><i class="circle">'+categories[i]+'</i>')

            } else { 

                divLegend.innerHTML += labels.push(
                    '<img src="/assets/icons/tpu.png" width="20" height="23"><i class="circle">'+categories[i]+'</i>')

            }
            
        }

        divLegend.innerHTML = labels.join('<br>')
        return divLegend
    }
    legend.addTo(map)
    </script>
</body>
</html>