
<?php
  //require MYSQLi Connection
  require('database/DBController.php');

  //require Product Class
  require('database/product.php');

  //require Cart Class
  require('database/cart.php');


//DBController Object
$db = new DBController();

//Product object
$product = new Product($db);
$product_shuffle = $product->getData();
// print_r($product->getData());

//Cart object
$cart = new Cart($db);

?>