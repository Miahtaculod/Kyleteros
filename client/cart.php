<?php
ob_start();
include('header.php');

?>

<?php

count($product->getData('cart')) ? include('Template/carts.php') : include('Template/forError/cartError.php');
// include('Template/carts.php');
count($product->getData('wishlist')) ? include('Template/wish-list.php') : include('Template/forError/wishlistError.php');
// include('Template/wish-list.php');


?>

<?php

include('footer.php');

?>