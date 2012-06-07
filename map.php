<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true&amp;libraries=places"></script>
    <script type="text/javascript">
	var map;
	var service;
	var infowindow;
	
	function detectBrowser() {
  var useragent = navigator.userAgent;
  var mapdiv = document.getElementById("map_canvas");

  if (useragent.indexOf('iPhone') != -1 || useragent.indexOf('Android') != -1 ) {
    mapdiv.style.width = '100%';
    mapdiv.style.height = '100%';
  } else {
    mapdiv.style.width = '600px';
    mapdiv.style.height = '800px';
  }
}
	
	
    function initialize() {
		  
		  var shops = new google.maps.LatLng(51.510879,0.069351);
		  
		  
		  
		  
          var map = new google.maps.Map(document.getElementById('map_canvas'), {
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          center: shops,
          zoom: 13,
		  panControl: true,
		  zoomControl: true,
		  mapTypeControl: false,
		  scaleControl: true,
		  streetViewControl: false,
		  overviewMapControl: true
		  
        });

	  
var marker = new google.maps.Marker({
  position: new google.maps.LatLng(51.510879,0.069351),
  map: map
});

  var request = {
    location: shops,
    radius: '5000',
    keyword: ['shop']
  };

  service = new google.maps.places.PlacesService(map);
  service.search(request, callback);
	}
	
	function callback(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      var place = results[i];
      createMarker(results[i]);
    }
  }
}
    </script>
<title>Demo Map</title>
  </head>
<body onload="initialize(), callback(results, status)">
<div id="map_canvas" style="width:100%; height:100%"></div>
</body>
</html>

