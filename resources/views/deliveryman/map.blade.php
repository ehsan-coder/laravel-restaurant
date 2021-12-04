<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapping</title>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>

   <script src="https://unpkg.com/esri-leaflet@3.0.2/dist/esri-leaflet.js"
    integrity="sha512-myckXhaJsP7Q7MZva03Tfme/MSF5a6HC2xryjAM4FxPLHGqlh5VALCbywHnzs2uPoF/4G/QVXyYDDSkp5nPfig=="
    crossorigin=""></script> 

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{asset('map/js/leaflet.textpath.js')}}"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/gokertanrisever/leaflet-ruler@master/src/leaflet-ruler.css" integrity="sha384-P9DABSdtEY/XDbEInD3q+PlL+BjqPCXGcF8EkhtKSfSTr/dS5PBKa9+/PMkW2xsY" crossorigin="anonymous">  
    <script src="https://cdn.jsdelivr.net/gh/gokertanrisever/leaflet-ruler@master/src/leaflet-ruler.js" integrity="sha384-N2S8y7hRzXUPiepaSiUvBH1ZZ7Tc/ZfchhbPdvOE5v3aBBCIepq9l+dBJPFdo1ZJ" crossorigin="anonymous"></script>

    <script src="{{asset('map/js/leaflet-hash.js')}}"></script>

    <link rel="stylesheet" href="{{asset('map/js/L.Control.MousePosition.css')}}"/>
    <script src="{{asset('map/js/L.Control.MousePosition.js')}}"></script>
  
  
    <link rel="stylesheet" href="{{asset('map/js/leaflet-routing-machine.css')}}"/>
    <script src="{{asset('map/js/leaflet-routing-machine.min.js')}}"></script>
  
    

    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>


<link rel="stylesheet" href="{{asset('map/js/Control.MiniMap.min.css')}}"/>
<script src="{{asset('map/js/Control.MiniMap.min.js')}}"></script>
  

  <style>
          #mapid { height: 500px; }

          .label-bidang{
              font-suze:10pt;
              color:#400ee6;
              text-align: center;
          }
    </style>

</head>
<body>

<br>

<div>
    <input id="titik_a" type = "hidden"></input>
    <input id="titik_b" type = "hidden"></input>
    <input id="jalan"   type = "hidden"></input>
</div>
 <br>
  <div id="mapid"></div>
</body>

<script>

var map = L.map('mapid').setView([33.5352309,36.2913703], 18);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png',{
    maxZoom: 20,
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


//MiniMap
var oSatelite=L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png',{
    maxZoom: 20,
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
});
var miniMap = new L.Control.MiniMap(oSatelite,{
  toggleDisplay:true,
  minimized:false
}).addTo(map);



//Distance
var options = {
          position: 'topleft',
          lengthUnit: {
            factor: 0.539956803,    //  from km to nm
            display: 'Nautical Miles',
            decimal: 2
          }
        };
L.control.ruler(options).addTo(map);
//Hash
var hash = new L.Hash(map);
//Mouse
L.control.mousePosition().addTo(map);
//Routing
 var waypoints= [
    L.latLng(33.53371732596268,36.30412353038788),
    L.latLng(33.53459822056492,36.294740438461304)
    
  ];
  var routeControl = L.Routing.control({
    waypoints : waypoints,
    routeWhileDragging:true,
    lineOptions:{
          styles:[{color: 'red', opacity: 1, weight: 5}]
      },
  }).addTo(map);

  routeControl.on('routesfound',function(e){
      console.log(e.routes[0]);
      var distance = e.routes[0].summary.totalDistance;
      var time = e.routes[0].summary.totalTime;
      
      document.getElementById('titik_a').value = e.routes[0].waypoints[0].latLng.lat +','+e.routes[0].waypoints[1].latLng.lng;
      document.getElementById("titik_b").value = e.routes[0].waypoints[1].latLng.lat +','+e.routes[0].waypoints[1].latLng.lng;
      document.getElementById("jalan").value  = e.routes[0].name;
  });

  
</script>

</html>