<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Type: Arrays</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        h1{
            color: purple;
        }
    </style>
    
  </head>
      <body>
        <div class="container-fluid">
            <h1>Arrays:</h1>
            <div>
<?php
// Index Arrays
$carmakes = array("Audi", "BMW", "Mercedes");
echo "<p>Car Makes:</p>";
print_r($carmakes);
echo "<p>Car Makes: Element one</p>";
echo $carmakes[0]; 

// Associative Arrays
/* Comment
comment */
$shoppingBasket1 = array("a"=>"Bread", "b"=>"Milk", "c"=>"Eggs");
$shoppingBasket2 = array("b"=>"Milk", "a"=>"Bread", "c"=>"Eggs");
$shoppingBasket3 = array("d"=>"Yogurt", "e"=>"Orange", "f"=>"Apple");
$shoppingBasket = $shoppingBasket1 + $shoppingBasket3;
echo "<p>Shopping Basket:</p>";
print_r($shoppingBasket1);
echo "<br />";
var_dump($shoppingBasket1);
echo "<p>shoppingBasket1 == shoppingBasket2</p>";
var_dump($shoppingBasket1 == $shoppingBasket2);
echo "<p>Basket 3</p>";
print_r($shoppingBasket3); // Prints Arrays
echo "<p>shoppingBasket1 <> shoppingBasket3</p>"; // Creates Paragraph
var_dump($shoppingBasket1<> $shoppingBasket3); // Dumps the variable
echo "<p>ShoppingBasket1 + shoppingBasket3 </p>";
print_r($shoppingBasket1 + $shoppingBasket3); // Dumps the variable
?>
                
            </div>
        </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
      </script>
      <script src="js/bootstrap.min.js">
      </script>
      </body>
</html>