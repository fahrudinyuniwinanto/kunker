<div id="home" class="content has-bg home">
    <div class="container" data-animation="true" data-animation-type="animate__fadeInRight">
    </div>
    <div id="map" style="width: 100%"></div> 

</div>

<div id="action-box" class="content has-bg" data-scrollview="true">

            <div class="content-bg" style="background-image: url(<?= base_url() ?>assets/vendor/coloradmin/assets/frontend/assets/img/bg/bg-action.jpg)" data-paroller-factor="0.5" data-paroller-factor-md="0.01" data-paroller-factor-xs="0.01">
            </div>


            <div class="container" data-animation="true" data-animation-type="animate__fadeInRight">

                <div class="row action-box">

                    <div class="col-lg-9">
                        <div class="icon-large text-primary">
                            <i class="fa fa-globe"></i>
                        </div>
                        <h3><?= data_app('APP_NAME') ?></h3>
                        <p>
                            <?= data_app('APP_DESC') ?>
                        </p>
                    </div>


                    <div class="col-lg-3">
                        <a href="#" class="btn btn-outline-white btn-theme btn-block"><i class="fa fa-location-arrow"></i> Peta Data</a>
                    </div>

                </div>

            </div>

        </div>


<div id="milestone" class="content bg-black-darker has-bg" data-scrollview="true">

    <div class="content-bg" style="background-image: url(../assets/img/bg/bg-milestone.jpg)" data-paroller="true" data-paroller-factor="0.5" data-paroller-factor-md="0.01" data-paroller-factor-xs="0.01"></div>


    <div class="container">

        <div class="row">

            <div class="col-lg-3 milestone-col">
                <div class="milestone">
                    <div class="number" data-animation="true" data-animation-type="number" data-final-number="1292">1,292</div>
                    <div class="title">Themes & Template</div>
                </div>
            </div>


            <div class="col-lg-3 milestone-col">
                <div class="milestone">
                    <div class="number" data-animation="true" data-animation-type="number" data-final-number="9039">9,039</div>
                    <div class="title">Registered Members</div>
                </div>
            </div>


            <div class="col-lg-3 milestone-col">
                <div class="milestone">
                    <div class="number" data-animation="true" data-animation-type="number" data-final-number="89291">89,291</div>
                    <div class="title">Items Sold</div>
                </div>
            </div>


            <div class="col-lg-3 milestone-col">
                <div class="milestone">
                    <div class="number" data-animation="true" data-animation-type="number" data-final-number="129">129</div>
                    <div class="title">Theme Authors</div>
                </div>
            </div>

        </div>

    </div>

</div>


<div id="team" class="content" data-scrollview="true">

    <div class="container">
        <h2 class="content-title">LAYANAN KAMI</h2>
        <div class="row">
            <?php
            foreach ($layanan_kami_data as $layanan_kami)
            {
                ?>


                <div class="col-lg-3">
                    <div class="team">
                        <div class="image" data-animation="true" data-animation-type="animate__flipInX">
                            <img src="../assets/img/user/user-1.jpg" alt="Ryan Teller" />
                        </div>
                        <div class="info">
                            <h3 class="name"><?php echo $layanan_kami->label ?></h3>
                            <div class="title text-primary"><?php echo $layanan_kami->note ?></div>
                        </div>
                    </div>

                </div>


                <?php
            }
            ?>
        </div>

    </div>

</div>





<div id="footer" class="footer">
    <div class="container">
        <div class="footer-brand">
            <img src="<?= base_url() ?>assets/img/temanggung.png" style ="width: 4%; height: 60px;"/></br>
            <?= data_app('RIGHT_FOOTER') ?>
            <p>
                <?= data_app('LEFT_FOOTER') ?> <br />
            </p>
        </div>
        
        <p class="social-list">
            <a href="#"><i class="fab fa-facebook-f fa-fw"></i></a>
            <a href="#"><i class="fab fa-instagram fa-fw"></i></a>
            <a href="#"><i class="fab fa-twitter fa-fw"></i></a>
            <a href="#"><i class="fab fa-google-plus-g fa-fw"></i></a>
            <a href="#"><i class="fab fa-dribbble fa-fw"></i></a>
        </p>
    </div>
</div>

<!-- Custom Theme Style -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin=""/>
    <link rel="stylesheet" href="<?=base_url()?>assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
    <style type="text/css">
        #map { height: 100vh; }
        .icon {
      display: inline-block;
      margin: 2px;
      height: 16px;
      width: 16px;
      background-color: #ccc;
      }
      .icon-bar {
        background: url('assets/js/leaflet-panel-layers-master/examples/images/icons/bar.png') center center no-repeat;
    }
    .leaflet-tooltip.no-background{
      background: transparent;
      border:0;
      box-shadow: none;
      color: #fff;
      font-weight: bold;
      text-shadow: 1px 1px 1px #000,-1px 1px 1px #000,1px -1px 1px #000,-1px -1px 1px #000;
    }
    .leaflet-popup{
      width: 500px;

    }
    .leaflet-popup-content{
      width: 500px;
      

    }

    </style>
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/js/leaflet-search/dist/leaflet-search.min.css')?>">
    <style type="text/css">
        
        .search-tip b {
            display: inline-block;
            clear: left;
            float: right;
            padding: 0 4px;
            margin-left: 4px;
        }

        .Banjir.search-tip b,
        .Banjir.leaflet-marker-icon {
            background: #f66
        }
    </style>
<!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHqhgVQmhdp3XAJ91LHRdXJ3YOjP1V2Gs" async defer></script>
    <script src="<?= base_url() ?>assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>
    <script src="<?= base_url() ?>assets/js/leaflet.ajax.js"></script>
    <script src="<?= base_url() ?>assets/js/Leaflet.GoogleMutant.js"></script>
    <script src="<?= base_url() ?>assets/js/leaflet-search/dist/leaflet-search.src.js"></script>
    <script src="<?= base_url() ?>api/data/kecamatan"></script>
    <script src="<?= base_url() ?>api/data/desa"></script>
    <script src="<?= base_url() ?>api/data/das_statistik/varpoint"></script>                
    <script type="text/javascript">
        var map = L.map('map').setView([-7.3186046, 110.1597487], 11);
    
    var Layer=L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox.streets',
        //create token
        // accessToken: 'pk.eyJ1IjoiYW5uZXNuIiwiYSI6ImNsMWtiZGE1eTE1Mm4zb281c3V6czJzemkifQ.II-xBTXfprjvBSNAWUjZNg'
        // dari contoh aplikasi
        accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
    });

    var layersKecamatan=[];
    var layersDesa=[];

    var roadMutant = L.gridLayer.googleMutant({
            maxZoom: 24,
            type:'roadmap'
    });

    
    map.addLayer(L.gridLayer.googleMutant({
                maxZoom: 30,
                type:'satellite'
            }));
    //map.addLayer(Layer);

    // map.on('zoomend', function() {
    // if (map.getZoom() <= 11){
    //         map.addLayer(L.gridLayer.googleMutant({
    //             maxZoom: 30,
    //             type:'satellite'
    //         }));
    //         map.addLayer(layersKecamatan);
    //         map.removeLayer(layersDesa);
            

    // }
    //  if (map.getZoom() > 11){

    //         map.addLayer(layersDesa);
            

    // }
    
    // });

    // master_data
    
    var layersMasterData=L.geoJSON(das_statistik, {
        pointToLayer: function (feature, latlng) {
            // console.log(feature)
            return L.marker(latlng, {
                icon : new L.icon({
                        iconUrl: feature.properties.icon,
                        iconSize: [38, 45]
                        })
            });
        },
        onEachFeature: function(feature,layer){
             if (feature.properties && feature.properties.name) {
                layer.bindPopup(feature.properties.popUp);
            }
        }
    }).addTo(map);
    
    // akhir masterdata
    
    // pengaturan legend

    function iconByName(name) {
        return '<i class="icon" style="background-color:'+name+';border-radius:10%"></i>';
    }


    function iconByImage(image) {
        return '<img src="'+image+'" style="width:16px">';
    }


   var baseLayers = [
        {
            name: "OpenStreetMap",
            layer: Layer
        },
        {   
            name: "OpenCycleMap",
            layer: L.tileLayer('http://{s}.tile.opencyclemap.org/cycle/{z}/{x}/{y}.png')
        },
        {
            name: "Outdoors",
            layer: L.tileLayer('http://{s}.tile.thunderforest.com/outdoors/{z}/{x}/{y}.png')
        },
        {
            name:'Satelite Google',
            layer : L.gridLayer.googleMutant({
                maxZoom: 24,
                type:'satellite'
            })
        },
        {
            name: "Roadmap Google",
            layer: roadMutant
        }
    ];


    
    // pengaturan untuk layer kecamatan
    function getColorKecamatan(id_kecamatan){
        for(i=0;i<dataKecamatan.length;i++){
            var data=dataKecamatan[i];
            if(data.id_kecamatan==id_kecamatan){
                return data.geo_color;
            }
        }
    }

    function popUpkec(f,l){
        var html='';
        if (f.properties){
            
            l.bindTooltip(f.properties['NK'],{
                permanent:true,
                direction:"center",
                className:"no-background"
            });
        }
    }
    
        
        for(i=0;i<dataKecamatan.length;i++){
            // console.log('load kecamatan');
            var data=dataKecamatan[i];
            var layer={
                name: data.nama_kecamatan,
                icon: iconByName(data.geo_color),
                layer: new L.GeoJSON.AJAX(["<?=base_url('assets/geojson/kecamatan')?>/"+data.geo_file],
                    {
                        onEachFeature:popUpkec,
                        style: function(feature){
                            var id_kecamatan=feature.properties.id_kecamatan;
                            return {
                                "color": getColorKecamatan(id_kecamatan),
                                "weight": 1,
                                "opacity": 1
                            }

                        },
                    }).addTo(map)
                }
            layersKecamatan.push(layer);
        }

    //pengaturan untuk layer desa
    // function getColorDesa(id_desa){
    //     for(i=0;i<dataDesa.length;i++){
    //         var data=dataDesa[i];
    //         if(data.id_desa==id_desa){
    //             return data.geo_color;
    //         }
    //     }
    // }
    // function popUp(f,l){
    //     var html='';
    //     if (f.properties){
    //         l.bindPopup(html);
    //         l.bindTooltip(f.properties['ND'],{
    //             permanent:true,
    //             direction:"center",
    //             className:"no-background"
    //         })
    //         ;
    //     }
    // }

    // for(i=0;i<dataDesa.length;i++){
    //     // console.log('load kecamatan');
    //     var data=dataDesa[i];
    //     var layer={
    //         name: data.nama_desa,
    //         icon: iconByName(data.geo_color),
    //         layer: new L.GeoJSON.AJAX(["<?=base_url('assets/geojson/desa')?>/"+data.id_kecamatan+'/'+data.geo_file],
    //             {
    //                 onEachFeature:popUp,
    //                 style: function(feature){
    //                     var id_desa=feature.properties.id_desa;
    //                     return {
    //                         "color": getColorDesa(id_desa),
    //                         "weight": 1,
    //                         "opacity": 1
    //                     }

    //                 },
    //             }).addTo(map)
    //         }
    //     layersDesa.push(layer);
    // }


    
    var overLayers = [

    {
        group: "Data Statistik",
        layers: [{
                    name: "Data Statistik",
                    icon: iconByImage("<?=assets('marker/marker.png')?>"),
                    layer: layersMasterData
            }]
     },
    
    // {
    //     group: "Kecamatan",
    //     layers: layersKecamatan
    // },
    // {
    //     group: "Desa",
    //     layers: layersDesa
    // }
    ];

    var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers,{
        collapsibleGroups: true
    });

    map.addControl(panelLayers);
    
    

   </script>