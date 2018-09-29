<!DOCTYPE html>
<html>
    <head>
        <title>Direction Service</title>
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
        <button onclick="calcRoute();">Calculate Route</button>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw8BOQqEoBlTft9Eqqla1DZfPRu4yHkiA"></script>
        <script>
            //Set Map options
            var myLatLng = {lat: 51.5, lng: -0.1};
            var mapOptions = {
                center: myLatLng,
                zoom: 7,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
        
            // Create Map
            var map = new google.maps.Map(document.getElementById('map'), mapOptions);

            // Create a directionService object to use the route method and get result for request
            var directionsService = new google.maps.DirectionsService();

            // Create a Directions Renderer object to display route
            var directionsDisplay = new google.maps.DirectionsRenderer();

            // Bind the directions renderer to the map
            directionsDisplay.setMap(map);

            // Define calcRoute
            function calcRoute(){
                var request = {
                    origin: "New York",
                    destination: "Toronto",
                    travelMode: google.maps.TravelMode.DRIVING, // WALKING, BYCYCLING, TRANSIT
                    unitSystem: google.maps.UnitSystem.METRIC
                }

                // Pass the request to the route method
                directionsService.route(request, 
                    function(result, status){
                        if(status == google.maps.DirectionsStatus.OK){
                            console.log(result);
                            // Get distance and time
                            window.alert("The travelling distance is " + result.routes[0].legs[0].distance.text + ".\nThe travelling time is: " + result.routes[0].legs[0].duration.text + ".");

                            // Display route
                            directionsDisplay.setDirections(result);
                        }
                });
            }


        </script>
    </body>

</html>