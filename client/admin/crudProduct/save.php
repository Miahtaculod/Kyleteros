<?php
	require_once '../database/dbController.php';
	if(ISSET($_POST['save'])){
		$image_name = $_FILES['item_image']['name'];
		$image_temp = $_FILES['item_image']['tmp_name'];
        $item_name = $_POST['item_name'];
		$item_brand = $_POST['item_brand'];
        $item_description = $_POST['item_description'];
        $item_price = $_POST['item_price'];
		$exp = explode(".", $image_name);
		$end = end($exp);
		$name = time().".".$end;
		$path = "upload/".$name;
		$allowed_ext = array("gif", "jpg", "jpeg", "png" , "GIF" , "JPG" , "JPEG" , "PNG");
		if(in_array($end, $allowed_ext)){
			if(move_uploaded_file($image_temp, $path)){
				mysqli_query($db_admin, "INSERT INTO `product` VALUES('', '$item_brand', '$item_name', '$item_price', '$path', '', '$item_description')");
				echo "<script>alert('Product saved!')</script>";
                header("location: crudProduct.php");
			}	
		}else{
			echo "<script>alert('Image only')</script>";
		}
	}
?>