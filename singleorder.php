<?php

include_once('include/init.php');

include_once('pagelayout/header.php');
if(!$session->isSignedIn()){
    include_once('pagelayout/top_header.php');
}else{
  $user = User::find_by_id($session->userId);
  //echo $user->name;
  logoutOption($user);
}
spacer(30);

include_once('pagelayout/second_header.php');
spacer(50);
include_once('pagelayout/navbar.php');
spacer(50);

?>
<?php

if(isset($_GET['id'])){
  $orders = Order::find_all_order_by_order_no($_GET['id']);
  if($orders!=false){
    $temp = $orders;
    $temp_order = array_shift($temp);
    $user = User::find_by_id($temp_order->user_id);
    $order_total_price = Order::total_order_price($_GET['id']);





 ?>

<div class="row">
  <div class="col-md-2 col-sm-0"></div>
  <div class="col-md-8 col-sm-12 text-center">
    <h3>User Name : <?php echo $user->name; ?></h3>
    <h3>Email: <?php echo $user->email; ?></h3>
    <h3>Phone: <?php echo $user->phone; ?></h3>
    <h3>Address: <?php echo $user->address; ?></h3>
    <h3>Total: <?php echo  $order_total_price->order_total_price; ?></h3>
  </div>
</div>

<?php
spacer(20);
 ?>
<div class="row">
  <div class="col-md-2 col-sm-0"></div>
  <div class="col-md-8 col-sm-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
          <?php
          $sl = 1;
          foreach ($orders as $order) {
            $product = Product::find_by_id($order->product_id);
            ?>
            <tr>
                <th scope="col"><?php echo $sl; ?></th>
                <td ><?php echo $product->name; ?> Name</td>
                <td ><?php echo $product->price; ?></td>
                <td ><?php echo $order->quantity; ?></td>
                <td ><?php echo $order->price; ?></td>
            </tr>
            <?php
            $sl++;
          }
           ?>
        </tbody>
    </table>
  </div>
</div>

<?php } } ?>
 <?php

 include_once('pagelayout/footer.php');

 ?>
