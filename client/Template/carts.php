
<!--Shopping cart section-->
<?php 



    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['delete-cart-submit'])){
             $deleteditem = $cart->deleteCartItem($_POST['item_id']);
            
        }
        
        //save for later
        if(isset($_POST['wishlist-submit'])){
            $cart->saveForLater($_POST['item_id']);
        }
    }
?>


  <section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!--shopping cart items-->
        <div class="row">
            <div class="col-sm-9">
                <?php 


              
                foreach ($product->getData('cart') as $item) :
                    $cartStorage = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item){
                ?>
                <!--Cart item-->
              
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                      <a href="<?php printf('%s?item_id=%s', 'product.php',$item['item_id'])?>">  <img src="admin/crudProduct/<?php echo $item['item_image'] ?? "No image available"?>" alt="cart1" style="height: 120px" class="img-fluid"></a>
                    </div>
                
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $item['item_name'] ?? "Item name not available"; ?></h5>
                        <small><?php echo $item['item_brand'] ?? "Item brand not available"; ?></small>
                        <!--Product rating-->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                              </div>
                              <a href="#" class="px-2 font-rale font-size-14">Total ratings (numbers)</a>
                        </div>
                         <!--Product rating-->
                         
                         <!--product quantity-->
                            <div class="qty d-flex py-2">
                                <div class="d-flex font-rale w-25">
                                    <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                    <input type="text" data-id="<?php echo $item['item_id'] ?? '0'; ?>" class="qty-input border px-2 w-100 bg-light text-center" value="1" placeholder="1" disabled>
                                    <button class="qty-down border bg-light" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><i class="fas fa-angle-down"></i></button>
                                </div>
                                <form method="POST">
                                <input type="hidden" value="<?php echo $item['item_id']?>" name="item_id">
                                <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                                </form>
                               
                                <form method="POST">
                                <input type="hidden" value="<?php echo $item['item_id']?>" name="item_id">
                                <button type="submit" name="wishlist-submit" class="btn font-baloo text-danger">Save for Later</button>
                                </form>
                            </div>
                         <!--product quantity-->
                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="product-price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] ?? "Item price not available"; ?></span>
                        </div>
                    </div>
                </div>
                <!--Cart item-->
                
                <?php
                    
                     return $item['item_price'];
                    },$cartStorage); //closing array_map function
                   
                    endforeach;    
                ?>
            </div>
            <!--sub total section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-14 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery. </h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size 20">Subtotal (<?php echo isset ($subTotal) ? count($subTotal) : 0;?>):&nbsp;<span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $cart->getSum($subTotal) : 0; ?></span></span></h5>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                    </div>
                </div>
            </div>
            <!--sub total section-->
        </div>
        <!--shopping cart items-->
    </div>
  </section>
  <!--Shopping cart section-->