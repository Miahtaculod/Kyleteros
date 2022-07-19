  <!--New Phones-->
  <?php
  shuffle($product_shuffle);

  //request method post for top sales
if($_SERVER['REQUEST_METHOD'] == "POST"){
  if (isset($_POST['new_phones_submit'])){
     // call method addToCart
  $cart->addToCart($_POST['user_id'],$_POST['item_id']);

  }
 
}


  ?>
  <sections id="new-phones">
    <div class="container my-5">
      <h4 class="font-rubik font-size-20">
        New Phones
      </h4>
      <hr>
      <!--Owl carousel-->
      <div class="owl-carousel owl-theme">
        <?php foreach ($product_shuffle as $item) { ?>
          <div class="item py-2 bg-light">
            <div class="product font-rale">
              <a href="<?php printf('%s?item_id=%s', 'product.php',$item['item_id'])?>"><img src="admin/crudProduct/<?php echo $item['item_image'] ?? "./assets/Banner1.jpg" ?>" alt="product1" class="img-fluid"></a>
              <div class="text-center">
                <h6><?php echo $item['item_name'] ?? "No item name" ?></h6>
                <div class="rating text-warning font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>
                </div>
                <div class="price py-2">
                  <span>$<?php echo $item['item_price'] ?? "No item price" ?></span>
                </div>
                <form method="POST">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1';?>">
                <input type="hidden" name="user_id" value="<?php echo 1;?>">
                <?php 
                if (in_array($item['item_id'],$cart->getCartId($product->getData('cart')) ??[])){
                  echo'<button type="submit" class="btn btn-success font-size-12">Already in Cart</button>';
                }
                else{
                  echo' <button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                }
                ?>
                </form>
              </div>
            </div>
          </div> <?php } ?>
      </div>
      <!--Owl carousel-->
    </div>


  </sections>
  <!--New Phones-->