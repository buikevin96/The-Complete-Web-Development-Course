<!DOCTYPE html>
<html>
    <head>
        <title>Drop Markers and Animations</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <style>
            html, body{
                height:100%;
            }
            #map{
                height:60%;
            }
        </style>
    </head>

    <body>
        <div id="map"></div>
        <button onclick="showMarkers();">Show Existing Markers</button>
        <button onclick="clearMarkers();">Hide Markers From The Map</button>
        <button onclick="deleteMarkers();">Remove Markers Completely From The Map</button>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw8BOQqEoBlTft9Eqqla1DZfPRu4yHkiA"></script>
        <script>
            //Set Map options
            var myLatLng = {lat: 51.5, lng: -0.1};
            var mapOptions = {
                center: myLatLng,
                zoom: 7,
                mapTypeId: google.maps.MapTypeId.SATELLITE
            };
        
            // Create Map
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            //Setting the mapTypeID upon construction
            map.setMapTypeId(google.maps.MapTypeId.ROADMAP);

            // Create Marker1
            var marker1Options = {
                position: myLatLng,
                map: map,
                title: "This is London",
                draggable: true,
                animation: google.maps.Animation.DROP // Animation
            }

            // Create InfoWindow
            var marker1 = new google.maps.Marker(marker1Options);
            var contentString = "<div>This is an InfoWindow</div>";
            var infowindow = new google.maps.InfoWindow({
                content: contentString,
                maxWidth: 100
            });

            //Create marker2
            var marker2Options = {
                position: {lat: 52.1337, lng: -0.4577},
                title: "This is Bedford",
            }

            // Add Listener To The Marker To Show InfoWindow
            marker1.addListener("click", function(){
                infowindow.open(map, marker1);
            });

            var marker2 = new google.maps.Marker(marker2Options);
            marker2.setAnimation(google.maps.Animation.BOUNCE);
            marker2.setMap(map);

            // Remove Markers
            marker1.setMap(null);
            marker2.setMap(null);

            // Create array where we store markers
            var markers = [];

            // Create marker once we click on a point on the map
            map.addListener("click", function(event){
                var markerOptions = {
                    position: event.latLng,
                    //map: map
                }
                var marker = new google.maps.Marker(markerOptions);
                // Store Marker in array
                markers.push(marker);
            });

            // Show markers stored in the array
            function showMarkers() {
                for(var i=0; i<markers.length; i++){
                    addMarkerwithDelay(i);
                }
            }

            function addMarkerwithDelay(i){
                setTimeout(function(){
                    markers[i].setMap(map);
                    markers[i].setAnimation(google.maps.Animation.DROP);
                }, 200*i);
            }

            // Hide markers from the Map (Still in the array)
            function clearMarkers(){
                for(var i=0; i<markers.length; i++){
                    markers[i].setMap(null);
                }
            }

            // Delete Markers From The Array
            function deleteMarkers(){
                clearMarkers();
                markers = []; // Set the array to an empty array
            }
        </script>
    </body>

</html>