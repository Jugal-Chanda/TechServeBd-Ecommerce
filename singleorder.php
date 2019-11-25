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
<?php
spacer(20);
 ?>
 <div class=" row">
   <div class="col-md-2 col-sm-0">

   </div>
   <div class="col-md-8 col-sm-12 text-right">
     <a href="paymentslip.php?orderno=<?php echo $_GET['id']; ?>" class="btn btn-info">
       Payment Slip
     </a>
   </div>

 </div>
 <?php spacer(20); ?>
<div class="row">
  <div class="col-md-2 col-sm-0"></div>
  <div class="col-md-8 col-sm-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
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
                <td><?php echo $order->order_date(); ?></td>
                <td ><?php echo $product->name; ?> Name</td>
                <td ><?php echo $product->price; ?></td>
                <td ><?php echo $order->quantity; ?></td>
                <td ><?php echo $order->price; ?></td>
            </tr>
            <?php
            $sl++;
          }
           ?>
           <tr>
             <td colspan="5" class="text-right">Total:</td>
             <td><?php echo  $order_total_price->order_total_price; ?></td>
           </tr>
        </tbody>
    </table>
  </div>
</div>

<?php } } ?>
 <?php

 include_once('pagelayout/footer.php');

 ?>
