
<!--Shopping cart section-->
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['delete-wishlist-submit'])){
             $deleteditem = $cart->deleteWishlistItem($_POST['item_id']);
            
        }

        //move to cart
        if(isset($_POST['cart-submit'])){
            $cart->saveForLater($_POST['item_id'],'cart','wishlist');
        }

    }
?>


  <section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Wishlist</h5>

        <!--shopping cart items-->
        <div class="row">
            <div class="col-sm-9">
                <?php 
              
                foreach ($product->getData('wishlist') as $item) :
                    $cartStorage = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item){
                ?>
                <!--Cart item-->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="admin/crudProduct/<?php echo $item['item_image'] ?? "No image available"?>" alt="cart1" style="height: 120px" class="img-fluid">
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
                            
                                <form method="POST">
                                <input type="hidden" value="<?php echo $item['item_id']?>" name="item_id">
                                <button type="submit" name="delete-wishlist-submit" class="btn font-baloo text-danger pl-0 pr-3 border-right">Delete</button>
                                </form>
                                <form method="POST">
                                <input type="hidden" value="<?php echo $item['item_id']?>" name="item_id">
                                <button type="submit" name="cart-submit" class="btn font-baloo text-danger">Add to Cart</button>
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
       
        </div>
        <!--shopping cart items-->
    </div>
  </section>
  <!--Shopping cart section-->