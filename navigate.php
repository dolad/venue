<?php
require_once "classes/navigate_class.php";
if(isset($_POST['venue'])){
$venue = $_POST['venue'];
$obj = new Nav;
$obj->navigate($venue);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
       
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
       
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
           
              var lat_origin = position.coords.latitude;
              var lng_origin = position.coords.longitude;
              var lat_dest = <?php echo $obj->latitude ?>;
              var lng_dest = <?php echo $obj->longitude ?>;
               $.post("nav.php",{lat_origin:lat_origin,lng_origin:lng_origin,lat_dest:lat_dest,lng_dest:lng_dest},function(data){
                   $("body").html(data);
               })
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIkSdI6s4JgtGsfYE7RSirAfBSvWfHitk&callback=initMap">
    </script>
  </body>
</html>