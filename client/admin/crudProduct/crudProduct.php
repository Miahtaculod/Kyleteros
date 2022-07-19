<?php
require_once '../database/dbController.php';
?>

<!DOCTYPE html>
<html lang="en">
<title>Kyleteros</title>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" href="style.css">

    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
        <a class="navbar-brand" href="../../index.php">Kyleteros</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../../index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Storage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Users</a>
                </li>
            </ul>
        </div>
    </nav>
</head>

<!--Header-->

<body>
    <!--Main-->
    <main id="main-site">
        <section id="crudProduct">
            <div class="col-md-3"></div>
            <div class="col-md-6 ">

                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add Item</button>
                <br /><br />
                <table class="table table-bordered table-hover">
                    <thead class="alert-info">
                        <tr>
                            <th class="text-center">Image</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Brand</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Update</th>
                            <th class="text-center">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require '../database/dbController.php';

                        $query = mysqli_query($db_admin, "SELECT * FROM `product`");
                        while ($fetch = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td class="text-center align-middle"><img src="<?php echo $fetch['item_image'] ?>" height="80" width="100" /></td>
                                <td class="text-center align-middle"><?php echo $fetch['item_name'] ?></td>
                                <td class="text-center align-middle"><?php echo $fetch['item_brand'] ?></td>
                                <td class="text-center align-middle"><?php echo $fetch['item_description'] ?></td>
                                <td class="text-center align-middle"><?php echo $fetch['item_price'] ?></td>
                                <td class="text-center align-middle"><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $fetch['item_id'] ?>"><span class="glyphicon glyphicon-edit"></span> Update</button></td>
                                <form method="POST" action="delete.php">
                                    <input type="hidden" value="<?php echo $fetch['item_id'] ?>" name="item_id">
                                    <td class="text-center align-middle"><button name="deleteProduct" type="submit" class="btn btn-danger" <?php echo $fetch['item_id'] ?>><span class="glyphicon glyphicon-edit"></span> Remove</button></td>
                                </form>

                                <div class="modal fade" id="edit<?php echo $fetch['item_id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" enctype="multipart/form-data" action="edit.php">
                                                <div class="modal-header">
                                                    <h3 class="modal-title">Edit Item</h3>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12 text-center">
                                                            <strong>
                                                                <h3>Current Photo</h3>
                                                            </strong>
                                                            <img src="<?php echo $fetch['item_image'] ?>" height="120" width="150" />
                                                            <input type="hidden" name="previous" value="<?php echo $fetch['item_image'] ?>" />
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Name</label>
                                                            <input type="hidden" value="<?php echo $fetch['item_id'] ?>" name="item_id" />
                                                            <input type="text" class="form-control" value="<?php echo $fetch['item_name'] ?>" name="item_name" required="required" />
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Category</label>
                                                            <select class="form-control" name="item_brand">
                                                                <option selected value="<?php echo $fetch['item_brand'] ?>"><?php echo $fetch['item_brand'] ?></option>
                                                                <option value="Headache">Headache</option>
                                                                <option value="Stomachache">Stomachache</option>
                                                                <option value="RunnyNose">Runnynose</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Description</label>
                                                            <textarea type="text" class="form-control" value="<?php echo $fetch['item_description'] ?>" name="item_description" required="required"><?php echo $fetch['item_description'] ?></textarea>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Price</label>
                                                            <input type="number" class="form-control" value="<?php echo $fetch['item_price'] ?>" name="item_price" required="required" />
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Change Photo</label>
                                                            <input type="file" class="form-control" name="item_image" value="<?php echo $fetch['item_image'] ?>" required="required" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <br style="clear:both;" />
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                                    <button class="btn btn-warning" name="edit"><span class="glyphicon glyphicon-save"></span> Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="modal fade" id="form_modal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="save.php" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h3 class="modal-title">Add Item</h3>
                            </div>
                            <div class="modal-body">
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
                                        <label>Image</label>
                                        <input type="file" class="form-control" name="item_image" required="required" />
                                    </div>
                                </div>
                            </div>
                            <br style="clear:both;" />
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                <button class="btn btn-success" name="save"><span class="glyphicon glyphicon-save"></span> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </section>
    </main>
</body>
<!--Main-->

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>

</html>