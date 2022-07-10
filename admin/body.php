<?php

?>


<body>

    <!-- Trigger/Open The Modal -->
    <button id="myBtn" class="text-size-100 font-size-16 my-5">Add Product</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Add Item</p>
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Item Brand</label>
                        <input type="text" class="form-control" placeholder="Item Brand">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Item Name</label>
                        <input type="text" class="form-control" placeholder="Item Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Item Price</label>
                        <input type="number" class="form-control" placeholder="Item Price">
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
            </form>
        </div>

    </div>

    <script src="index.js"></script>

</body>