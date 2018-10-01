<!DOCTYPE html>
<html>
    <head>
        <title>Geocoding API</title>
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
        <div id="output"></div>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw8BOQqEoBlTft9Eqqla1DZfPRu4yHkiA"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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

            // Geocode Function
            function geocodeAddress(){
                var url = "https://maps.googleapis.com/maps/api/geocode/json?address="+document.getElementById("address").value+"&key=AIzaSyCw8BOQqEoBlTft9Eqqla1DZfPRu4yHkiA";
                //window.open(url);

                $.getJSON(url, function(data){
                    if(data.status == "OK"){

                    }else{
                        $("#output").html("Request Unsuccessful");
                    }
                });
            }

        </script>
    </body>

</html>