<!DOCTYPE html>
<html>
    <head>
        <title>Geocoding Using Google Maps Javascript API</title>
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
        <input type="text" placeholder="Address" id="address">
        <button onclick="geocodeAddress();">Geocode Address</button>

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

            // Create a geocoder object to use the geocode method
            var geocoder = new google.maps.Geocoder();

            // Create Geocode Function
            function geocodeAddress(){
                geocoder.geocode({'address': document.getElementById("address").value}, function(results, status){
                    if(status == google.maps.GeocoderStatus.OK){
                        console.log(results);
                        window.alert("Address Coordinates: " + results[0].geometry.location);
                        // Change the map image 
                        map.setCenter(results[0].geometry.location);
                        var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location
                        });
                    } else {
                        window.alert("Geocode not successful: " + status);
                    }
                });
            }


        </script>
    </body>

</html>