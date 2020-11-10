<html>
<body>

<div id="map" style="width:100%;height:500px"></div>

<script>
function myMap() {
  var mapCanvas = document.getElementById("map");
  var mapOptions = {
    center: new google.maps.LatLng(51.508742, -0.120850),
    zoom: 5
  };
  var map = new google.maps.Map(mapCanvas, mapOptions);
}
</script>
                                                           
<!--<script src="https://maps.googleapis.com/maps/api/js?key=&callback=myMap"></script>-->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmOiO4H0FUeFrwVtNdOPgc8xzPgqx2fQg&callback=initMap"
  type="text/javascript"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>
