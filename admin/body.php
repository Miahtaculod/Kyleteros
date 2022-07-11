<?php
 require('database/dbController.php');

// if ($_POST) {
//     $item_name = mysqli_real_escape_string($db_admin, $_POST['item_name']);
//     $item_brand = mysqli_real_escape_string($db_admin, $_POST['item_brand']);
//     $item_price = mysqli_real_escape_string($db_admin, $_POST['item_price']);
//     $item_description = mysqli_real_escape_string($db_admin, $_POST['item_description']);
    // $item_image = mysqli_real_escape_string($db_admin, $_POST['item_image']['name']);



    // $query = "INSERT INTO product(item_name, item_brand, item_price, item_description,item_image) VALUES('$item_name', '$item_brand', '$item_price', '$item_description', '')";
    

    if(isset($_POST["submit"])){
        $item_brand = $_POST["item_brand"];
        $item_description = $_POST["item_description"];
        $item_price = $_POST["item_price"];
        $item_name = $_POST["item_name"];
        if($_FILES["item_image"]["error"] == 4){
          echo
          "<script> alert('Image Does Not Exist'); </script>"
          ;
        }
        else{
          $fileName = $_FILES["item_image"]["name"];
          $fileSize = $_FILES["item_image"]["size"];
          $tmpName = $_FILES["item_image"]["tmp_name"];
      
          $validImageExtension = ['jpg', 'jpeg', 'png'];
          $imageExtension = explode('.', $fileName);
          $imageExtension = strtolower(end($imageExtension));
          if ( !in_array($imageExtension, $validImageExtension) ){
            echo
            "
            <script>
              alert('Invalid Image Extension');
            </script>
            ";
          }
          else if($fileSize > 1000000){
            echo
            "
            <script>
              alert('Image Size Is Too Large');
            </script>
            ";
          }
          else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            
            move_uploaded_file($tmpName, '../client/img/' . $newImageName);
            $query = "INSERT INTO product(item_brand,item_description,item_price,item_name,item_image) VALUES('$item_brand','$item_description','$item_price','$item_name','$newImageName')";
           
            mysqli_query($db_admin, $query);
            echo
            "
            <script>
              alert('Successfully Added');
            
            </script>
            ";
          }
        }
      }
// }






?>
<body>

    <!-- Trigger/Open The Modal -->
    <button type="tangina" id="myBtn" class="btn btn-primary text-center px-5 mx-5 my-5">Add Product</button>
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Add Item</p>
            <form action method="POST" enctype="multipart/form-data" >
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Item Name</label>
                        <input type="text" class="form-control" name="item_name">
                    </div>
                    <div class="form-group col-md-6" required>
                        <label>Item Category</label>
                        <select class="form-control" name="item_brand">
                        <option value="">Choose a category</option>
                            <option value="Headache">Headache</option>
                            <option value="Stomachache">Stomachache</option>
                            <option value="RunnyNose">Runnynose</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Product Description</label>
                        <textarea class="form-control" name="item_description" rows="3"></textarea>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Item Price</label>
                        <input type="number" class="form-control" name="item_price">
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>Item Image</label>
                        <input type="file" class="form-control-file" accept=".jpg, .jpeg, .png" name="item_image">
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-success px-5 mx-5 mt-2">Add Product</button>

                </div>
            </form>
        </div>
    </div>

    <table border = 1 cellspacing = 0 cellpadding = 10>
      <tr>
        <td>#</td>
        <td>Name</td>
        <td>Image</td>
      </tr>
      <?php
      $i = 1;
      $rows = mysqli_query($db_admin, "SELECT item_name, item_image FROM product ORDER BY item_id DESC")
      ?>

      <?php foreach ($rows as $row) : ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row["item_name"]; ?></td>
        <td> <img src="img/<?php echo $row["item_image"]; ?>" width = 200 title="<?php echo $row['item_image']; ?>"> </td>
      </tr>
      <?php endforeach; ?>
    </table>
    <script src="index.js"></script>
</body>