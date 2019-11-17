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
$user = User::find_by_id($session->userId);
if($session->isSignedIn() == true){
  $cart = Cart::total_cart_price_for_user($session->userId);
  if($cart!=false){

?>

<div class="row">
  <div class="col-md-4 col-sm-0" ></div>
  <div class="col-md-6 col-sm-12">
    <form class="form-inline text-right" action="page_action/order_now.php?id=<?php echo $session->userId; ?>" method="post">
      <div class="form-group mx-sm-3 mb-2">
        <label for="address" class="sr-only">Delivary Address</label>
        <input type="text" class="form-control" id="address" name="delivery_address" required value="<?php echo $user->address ?>">
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <label for="payment_method" class="sr-only">payment method</label>
        <select class="form-control" name="payment_method" id="payment_method">
          <option value="bKash">bKash</option>
        </select>
      </div>
      <div class="form-group mx-sm-3 mb-2">
        <label for="trxid" class="sr-only">Trx Id</label>
        <input type="text" class="form-control" id="trxid" name="trxid" placeholder="Trx Id">
      </div>
      <div class="mx-sm-3 mb-2">
        <h3>Total :
          <?php echo $cart->cart_total_price?$cart->cart_total_price:"0";
          ?> Tk</h3>
      </div>
      <button type="submit" class="btn btn-primary mb-2" name="order">Order Now</button>
    </form>

  </div>
</div>
<?php
}
}
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

                if($session->isSignedIn())
                    $carts = Cart::find_all_cart_by_user($session->userId);
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
                        <a href="#"><i class="fa fa-minus fa-sm" aria-hidden="false" style="color: black;"></i></a>

                            <?php echo $cart->quantity; ?>
                        <a href="#"><i class="fa fa-plus fa-sm" aria-hidden="false" style="color: black;"></i></a>

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
            }
            ?>

            </tbody>
        </table>
    </div>
</div>



<?php

include_once('pagelayout/footer.php');

?>
