 <!--Product-->
 <?php 

 
 $item_id = $_GET['item_id'] ?? 1;
 foreach ($product->getData() as $item):
    if ($item['item_id'] == $item_id):

   //request method post for top sales
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['product_to_cart'])){
       // call method addToCart
    $cart->addToCart($_POST['user_id'],$_POST['item_id']);
    header("Location: cart.php");
    }
  }
  
        


 ?>
 <section id="product" class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <img src="admin/crudProduct/<?php echo $item['item_image'] ?? "No image available"?>" alt="biogesic" class="img-fluid">
                    <div class="form-row pt-4 font-size-16 font-baloo">
                        <div class="col">
                            <button type="submit" class="btn btn-danger form-control">Proceed to Buy</button>
                        </div>
                        <div class="col">
                        <form method="POST">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1';?>">
                <input type="hidden" name="user_id" value="<?php echo 1;?>">
                <?php 
                if (in_array($item['item_id'],$cart->getCartId($product->getData('cart')) ??[])){
                  echo'<button type="submit" class="btn btn-success form-control">Already in Cart</button>';
                }
                else{
                  echo' <button type="submit" name="product_to_cart" class="btn btn-warning form-control">Add to Cart</button>';
                }
                ?>
                
                </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 py-5">
                    <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Item name not available"; ?></h5>
                    <small>by<?php echo $item['item_brand'] ?? "Item brand not available"; ?></small>
                    <div class="d-flex">
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                          </div>
                          <a href="#" class="px-2 font-rale font-size-14">Total Ratings and | questions</a>
                    </div>
                    <hr class="m-0">

                    <!--Product price-->
                    <table class="my-3">
                        <tr class="font-rale font-size-14">
                            <td>M.R.P:</td>
                            <td><strike>$162.00</strike></td>
                        </tr>
                        <tr class="font-rale font-size-14">
                            <td>Detail Price</td>
                            <td class="font-size-20 text-danger">&nbsp;&nbsp;$<span><?php echo $item['item_price'] ?? "Item price not available"; ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                        </tr>
                        <tr class="font-rale font-size-14">
                            <td>You saved</td>
                            <td>&nbsp;&nbsp;<span class="font-size-16 text-danger">$10.00</span></td>
                        </tr>
                    </table>
                    <!--Product price-->

                    <!--policy-->
                    <div id="policy">
                        <div class="d-flex">
                            <div class="return text-center mr-5">
                                <div class="font-size-20 my-2 color-second">
                                    <span class="fas fa-retweet border p-3 rounded-pill"></span>
                                </div>
                                <a href="#" class="font-rale font-size-12">10 Days<br> Replacement</a>
                            </div>

                            <div class="return text-center mr-5">
                                <div class="font-size-20 my-2 color-second">
                                    <span class="fas fa-truck border p-3 rounded-pill"></span>
                                </div>
                                <a href="#" class="font-rale font-size-12">Daily Tuition<br> Delivered</a>
                            </div>

                            <div class="return text-center mr-5">
                                <div class="font-size-20 my-2 color-second">
                                    <span class="fas fa-check-double border p-3 rounded-pill"></span>
                                </div>
                                <a href="#" class="font-rale font-size-12">1 Year<br> Warranty</a>
                            </div>
                        </div>
                    </div>
                    <!--policy-->
                    <hr>
                    <!--order details-->
                    <div id="order-details" class="font-rale d-flex flex-column text-dark">
                        <small>Delivery by : Mar 29 - Apr 1</small>
                        <small>Sold by <a href="#">Daily Electronics</a> Total stars | Total ratings</small>
                        <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 42421</small>
                    </div>
                    <!--order details-->

                    <!--product Quantity Section-->
                    <div class="row">
                        <div class="col-6 my-2">
                            <div class="qty d-flex">
                              <h6 class="font-baloo">Qty</h6>
                              <div class="px-4 d-flex font-rale">
                                <button data-id="pro1" class="qty-up border bg-light"><i class="fas fa-angle-up"></i></button>
                                <input data-id="pro1" type="text" class="qty-input border px-2 w-50 bg-light text-center" value="1" placeholder="1" disabled>
                                <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                              </div>
                            </div>
                        </div>
                    </div>
                      <!--product Quantity Section-->
                </div>
                <div class="col-12 py-5">
                  <h6 class="font-rubik">Product Description</h6>
                  <hr>
                  <p class="font-rale font-size-14">demo description of a product</p>
                  <p class="font-rale font-size-14">demo description of a product</p>
                </div>
            </div>
        </div>
    </section>
    <!--Product-->

<?php
    endif;
endforeach;

?>

