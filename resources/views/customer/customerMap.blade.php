@extends('customer.main')

@section('content')
    
<div id="map" class="map"></div>

{{-- <div>{{$markers[0]->name}}</div> --}}

@endsection
{{-- -------------------------------- --}}
@section('js')

<script>
      var map = L.map('map').setView([0,0],4);

      L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=NMLoBeB7t3i4scW8BTT2',{
          attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',
      }).addTo(map);


    //   var marker = L.marker([51.5 , -0,09]).bindPopup('hi').addTo(map);

      
          
   
</script>

@endsection