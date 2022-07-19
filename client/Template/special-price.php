<!--Special price-->
<?php 
$brand = array_map(function($product){return$product['item_brand'];},$product_shuffle);
$unique = array_unique($brand);
sort($unique);
shuffle($product_shuffle);

//request method post for top sales
if($_SERVER['REQUEST_METHOD'] == "POST"){
  if (isset($_POST['special_price_submit'])){
     // call method addToCart
  $cart->addToCart($_POST['user_id'],$_POST['item_id']);

  }
 
}

$in_Cart = $cart->getCartId($product->getData('cart'))

?>
<section id="special-price">
  <div class="container">
    <h4 class="font-rubik font-size-20">Special Price</h4>
    <div id="filters" class="button-group text-right font-baloo font-size-16">
      <button class="btn is-checked" data-filter="*">All Medicine</button>
      <?php 
        array_map(function($brand){
          printf('<button class="btn" data-filter=".%s">%s</button>',$brand,$brand);
        },$unique);
      ?>
    </div>

    <div class="grid">
      <?php array_map(function ($item) use ($in_Cart) { ?>
        <div class="grid-item border <?php echo $item['item_brand'] ?? "No item brand"; ?>">
          <div class="item py-2" style="width:200px;">
            <div class="product font-rale">
              <a href="<?php printf('%s?item_id=%s', 'product.php',$item['item_id'])?>"><img src="admin/crudProduct/<?php echo $item['item_image'] ?? "./assets/Banner1.jpg"; ?>" alt="product1" class="img-fluid"></a>
              <div class="text-center">
                <h6><?php echo $item['item_name'] ?? "No item name"; ?></h6>
                <div class="rating text-warning font-size-12">
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="fas fa-star"></i></span>
                  <span><i class="far fa-star"></i></span>
                </div>
                <div class="price py-2">
                  <span>$<?php echo $item['item_price'] ?? "No item price"; ?></span>
                </div>
                <form method="POST">
                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1';?>">
                <input type="hidden" name="user_id" value="<?php echo 1;?>">
                <?php 
                if (in_array($item['item_id'],$in_Cart ?? [])){
                  echo'<button type="submit" class="btn btn-success font-size-12">Already in Cart</button>';
                }
                else{
                  echo' <button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                }
                ?>
                                </form>
              </div>
            </div>
          </div>
        </div>
      <?php }, $product_shuffle) ?>
    </div>
  </div>
</section>
<!--Special price-->