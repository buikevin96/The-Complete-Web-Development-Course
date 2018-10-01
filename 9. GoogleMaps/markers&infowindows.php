<!DOCTYPE html>
<html>
    <head>
        <title>Markers And InfoWindows</title>
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
        </script>
    </body>

</html>