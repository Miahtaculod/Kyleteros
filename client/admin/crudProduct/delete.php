<?php
require_once '../database/dbController.php';
//DELETE PRODUCT

function deleteItem($item_id = null, $table = 'product')
{
    $db_admin = mysqli_connect("localhost", "root", "", "capstone_main");
    if ($item_id != null) {
        $deleteProductById = mysqli_query($db_admin, "DELETE FROM {$table} WHERE item_id = {$item_id}");
        if ($deleteProductById) {
            header("Location: " . $_SERVER['PHP_SELF']);
        }
        return $deleteProductById;
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['deleteProduct'])) {
        $deleteditem = deleteItem($_POST['item_id']);
        header("location: crudProduct.php");
    }
}
//DELETE PRODUCT

?>