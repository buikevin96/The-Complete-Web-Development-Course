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

            // Define marker variable
            var marker;

            // Geocode Function
            function geocodeAddress(){
                var url = "https://maps.googleapis.com/maps/api/geocode/json?address="+document.getElementById("address").value+"&key=AIzaSyCw8BOQqEoBlTft9Eqqla1DZfPRu4yHkiA";
                //window.open(url);

                $.getJSON(url, function(data){
                    if(data.status == "OK"){
                        var formattedAddress = data.results[0].formatted_address;
                        var latitude = data.results[0].geometry.location.lat;
                        var longitude = data.results[0].geometry.location.lng;
                        var postcode;

                        $.each(data.results[0].address_components, function(index, element){
                            if(element.types == "postal_code"){
                                postcode = element.long_name;
                                return false; // To stop the loop
                            }
                        });

                        // HTML Output onto div
                        $("#output").html("<b>Formatted Address: </b>" + formattedAddress + "<br /><b>Coordinates</b>: (lat: " + latitude + ", lng: " + longitude + ").<br /><b>PostCode</b>: " + postcode + ".");

                        // Center Map
                        map.setCenter({lat:latitude,lng:longitude});

                        // Change Zoom Level
                        map.setZoom(14);

                        // If marker is there delete it
                        if(marker != undefined){
                            marker.setMap(null);
                        }

                        // Create marker
                        marker = new google.maps.Marker({
                            map: map,
                            position: ({lat:latitude,lng:longitude}),
                            animation: google.maps.Animation.DROP
                        });
                    }else{
                        $("#output").html("Request Unsuccessful");
                    }
                });
            }

        </script>
    </body>

</html>