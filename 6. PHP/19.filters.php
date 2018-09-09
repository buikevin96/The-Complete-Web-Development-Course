<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filter User Inputs</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        h1{
            color: purple;
        }
    </style>
    
  </head>
      <body>
        <div class="container-fluid">
            <h1>Clean User Inputs</h1>
            <div>
<?php
// Username Example
$myUsername = '<script>window.alert("Hi")</script>buenosdias';
$myUsername = filter_var($myUsername, FILTER_SANITIZE_STRING);
echo $myUsername;
// Email example
$myEmail = 'sam         @completewebdevellopm\\\\ entcour   se.co.uk.com';
echo "<br />" . $myEmail;
// URL example
$myURL = "http://www.       google.com";
$myURL = filter_var($myURL, FILTER_SANITIZE_URL);
echo "<br />" . $myURL;
?>


            </div>
        </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
      </script>
      <script src="js/bootstrap.min.js">
      </script>
      </body>
</html>