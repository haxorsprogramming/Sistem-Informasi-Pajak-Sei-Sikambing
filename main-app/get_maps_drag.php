<html>
  <head>
    
  </head>
  <body>
    <div id="map" style="width:400px;height:200px;">
      
    </div>
    <button onclick="ambilPosisiAtc()">
      Ambil posisi
    </button>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&callback=initMap&libraries=&v=weekly" async></script>
  <script>

    var map, infoWindow;

    var alamat_gps = "";

    var lat_g, lng_g;
//     var marker_kita = "";
    
    function initMap() {
        var myLatlng = new google.maps.LatLng(3.5709852559841657, 98.71156731713579);
        var mapOptions = {
          zoom: 10,
          center: myLatlng
        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        // Place a draggable marker on the map
        var marker_kita = new google.maps.Marker({
            position: myLatlng,
            map: map,
            draggable:true,
            title:"Drag me!"
        });
      
      google.maps.event.addListener(marker_kita, 'dragend', function (evt) {
        lat_g = evt.latLng.lat().toFixed(7);
        lng_g = evt.latLng.lng().toFixed(7);
      });
    }

    function ambilPosisiAtc()
    {
      console.log(lat_g+"-"+lng_g);
    }

</script>
  </body>
</html>