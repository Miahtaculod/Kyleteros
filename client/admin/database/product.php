<?php

require ('dbController.php');

$allProductById = mysqli_query($db_admin, "SELECT * FROM product ORDER BY item_id DESC");


 
//delete product using item_id
// $deleteProd = null;

 function deleteItem($item_id = null,$table = 'product') {
    $db_admin = mysqli_connect("localhost", "root", "", "capstone_main");
        if ($item_id != null){
            $deleteProductById = mysqli_query($db_admin, "DELETE FROM {$table} WHERE item_id = {$item_id}");
            if ($deleteProductById){
                header("Location: ".$_SERVER['PHP_SELF']);
            }
            return $deleteProductById;
        }
    
}







?>