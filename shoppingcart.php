<?php

include_once('include/init.php');

include_once('pagelayout/header.php');
if(!$session->isSignedIn()){
    include_once('pagelayout/top_header.php');

}
spacer(30);

include_once('pagelayout/second_header.php');
spacer(50);
include_once('pagelayout/navbar.php');
spacer(50);
// $user = User::find_by_id($session->userId);
// if($session->isSignedIn() == true){
//   $cart = Cart::total_cart_price_for_user($session->userId);
//   if($cart!=false){

?>

<style>
.quantity_increase,.quantity_deccrease:hover {
  cursor: pointer;
}

</style>

<?php
spacer(10);
?>
<div class="row">
    <div class="col-md-2 col-sm-0"></div>
    <div class="col-md-8 col-sm-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            <?php

                if($session->isSignedIn()){
                  $carts = Cart::find_all_cart_by_user($session->userId);
                  $cart_total_price = Cart::total_cart_price_for_user($session->userId);
                }

                else
                    $carts = false;
                $sl = 1;
                if($carts != false){
                foreach($carts as $cart){
            ?>
                <tr>
                    <th scope="row"><?php echo $sl; ?></th>
                    <td>
                        <div class="text-center">
                            <img src="<?php echo $cart->product_image; ?>" class="rounded" alt="..." height="90">
                        </div>
                    </td>
                    <td>
                        <?php echo $cart->product_name; ?>
                    </td>
                    <td>
                        <?php echo $cart->product_price; ?>
                    </td>
                    <td class="text-center">
                        <span class="quantity_deccrease" value="<?php echo $cart->id; ?>"><i class="fa fa-minus fa-sm" aria-hidden="false" style="color: black;"></i></span>

                            <?php echo $cart->quantity; ?>
                        <span class="quantity_increase" value="<?php echo $cart->id; ?>"><i class="fa fa-plus fa-sm" aria-hidden="false" style="color: black;"></i></span>

                    </td>
                    <td>
                        <?php echo $cart->price; ?>
                    </td>
                    <td>
                        <div class="text-center">
                            <a href="#?id=<?php echo $cart->id; ?>">
                                <i class="fa fa-sync fa-2x" aria-hidden="false" style="color: black;"></i>
                            </a>
                            <a href="page_action/remove_from_cart.php?id=<?php echo $cart->id; ?>">
                                <i class="fa fa-trash fa-2x" aria-hidden="false" style="color: black;"></i>
                            </a>
                        </div>
                    </td>
                </tr>


            <?php
                    $sl++;
                }
            ?>
            <form class="" action="page_action/order_now.php?id=<?php echo $session->userId; ?>" method="post">


            <tr>
              <td colspan="2"><input type="text" class="form-control-plaintext" id="address" name="delivery_address" required value="East West University Campus Gate"></td>
              <td>
                <select class="form-control" name="payment_method" id="payment_method">
                  <option value="bKash">bKash</option>
                </select>
            </td>
            <td>
              <input type="text" class="form-control" id="trxid" name="trxid" placeholder="Transaction ID">
            </td>
            <td>Total:</td>
            <td>
              <?php echo $cart_total_price->cart_total_price?$cart_total_price->cart_total_price:"0";
              ?> Tk</h3>
            </td>
            <td class="text-center"><button type="submit" class="btn btn-success" name="order">Order Now</button></td>
            </tr>
            </form>
          <?php } ?>

            </tbody>
        </table>
    </div>
</div>

<script src="js\shopingcart.js"></script>
<?php
//

include_once('pagelayout/footer.php');


?>
