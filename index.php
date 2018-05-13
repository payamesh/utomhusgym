<!DOCTYPE html>
<html>
  <head>
  <script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAye5DUciZ6mIVYNXd7tSPeEUQqDYZ5OIg&libraries=geometry,places">
</script>">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
 
  <form action="search.php" method="post">
<input type="text" id="searchBar" placeholder="" value="Sök kommun.." maxlength="25" autocomplete="on" onMouseDown="active();" onBlur="inactive();"/><input type="submit" id="searchBtn" value="Sök" />
 <div id="map"></div>


</script>

    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      

      var map;
      var infowindow;

      function initMap() {
        var pyrmont = {lat: -33.867, lng: 151.195};

        map = new google.maps.Map(document.getElementById('map'), {
          center: pyrmont,
          zoom: 15
        });

        infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);
        service.nearbySearch({
          location: pyrmont,
          radius: 500,
          type: ['store']
        }, callback);
      }

      function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
      }

      function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }
    </script>
  



  </body>
</html>