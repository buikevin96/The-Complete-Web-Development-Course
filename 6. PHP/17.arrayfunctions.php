<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Array Functions</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        h1{
            color: purple;
        }
    </style>
    
  </head>
      <body>
        <div class="container-fluid">
            <h1>Array Functions</h1>
            <div>
<?php
$shoppingBasket1 = array("bread", "milk", "eggs", "bread");
$shoppingBasket2 = array("apple", "banana", "orange");
$shoppingBasket = array_merge($shoppingBasket1, $shoppingBasket2); // Merge Arrays twogether
echo "<p>Shopping Basket:</p>";
print_r($shoppingBasket);
echo "<p>Number of items in Shopping Basket:</p>" . count($shoppingBasket); // Counts the number of items in array
                
$count = array_count_values($shoppingBasket);
echo "<p>Basket Count</p>";
print_r($count);
echo "<p>Number of bread items in Basket: </p>" . $count["bread"];
                
if(in_array("bread", $shoppingBasket)){
    echo "<p>There is bread in the basket.</p>";
} else {
    echo "<p>There is no bread in the basket.</p>";
}

// Array will now have yogurt at the end
array_push($shoppingBasket, "yogurt");
echo "<p>Shopping Basket after adding yogurt</p>";
print_r($shoppingBasket);
echo "<br />";
if($_GET["submit"]){
    if($_GET["item"]){
        array_push($shoppingBasket, $_GET["item"]); // Gets the item user input into field and push into array at the end
    }
}
print_r($shoppingBasket);
echo "<br />";
                
// Replace array items in position starting from 0 and delete 2 items     
array_splice($shoppingBasket, 0, 2, array("mango", "kiwi"));
        print_r($shoppingBasket);
echo "<br />";
               
// Sort array in ascending order
sort($shoppingBasket); //or use rsort() for reverse order
echo "<p>Shopping Basket sorted in ascending order: </p>";
print_r($shoppingBasket);
                
$carMakes = array("BMW"=>"X%", "Audi"=>"A6", "Mercedes"=>"CLS");
echo "<p>Car Makes:</p>";
print_r($carMakes);

asort($carMakes);
echo "<p>Car makes sorted in ascending order print by value:</p>";
// Sort in ascending order by value
print_r($carMakes);
                
echo "<p>Car makes sorted in ascending order by keys:</p>";
ksort($carMakes);
                
?>
                <form>
                    <label for="item">Add item to shopping Basket:</label>
                    <input type="text" name="item" id="item">
                    <input type="submit" name="submit" value="Submit">
                </form>

            </div>
        </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
      </script>
      <script src="js/bootstrap.min.js">
      </script>
      </body>
</html>