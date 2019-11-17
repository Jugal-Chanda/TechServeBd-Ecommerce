

<?php

include_once('include/init.php');
include_once('pagelayout/header.php');
include_once('pagelayout/admin_is_signedin.php');
spacer(30);
include_once('pagelayout/second_header.php');
spacer(50);
include_once('pagelayout/adminnavbar.php');
spacer(50);
?>
<?php
if(isset($_GET['orderNo'])){
  $orders = Order::find_all_order_by_order_no($_GET['orderNo']);
  if($orders!=false){
    //print_r($orders);
?>
<div class="row">
  <div class="col-md-2 col-sm-0"></div>
  <div class="col-md-8 col-sm-12 text-center">
    <?php
    $temp_order = $orders;
    $order = array_shift($temp_order);
    $user = User::find_by_id($order->user_id);
    $order_total_price = Order::total_order_price($_GET['orderNo']);
    ?>
    <h3>User Name : <?php echo $user->name; ?></h3>
    <h3>Email: <?php echo $user->email; ?></h3>
    <h3>Phone: <?php echo $user->phone; ?></h3>
    <h3>Address: <?php echo $user->address; ?></h3>
    <h3>Payment Method : <?php echo $order->delivery_method; ?></h3>
    <h3>Total: <?php echo  $order_total_price->order_total_price; ?></h3>
  </div>
</div>

<div class="row">

  <div class="col-md-9 col-sm-0">

  </div>
  <div class="col-md-1 col-sm-12 text-center">
    <a href="page_action/confirm_order.php?orderno=<?php echo $_GET['orderNo']; ?>" class="btn btn-primary">
      <?php if($order->delivered ==true){
        echo "Delivered";
      }else{
        echo "Confirm";
      } ?>


    </a>

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
                <th scope="col">Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
            </tr>
            <?php
            $sl = 1;
            foreach ($orders as $order) {
              $product = Product::find_by_id($order->product_id);
            ?>

            <tr>
              <th scope="row"> <?php echo $sl; ?> </th>
              <td>
                <div class="text-center">
                    <img src="<?php echo $product->image; ?>" class="rounded" alt="..." height="90">
                </div>
              </td>
              <td><?php echo $product->name; ?></td>
              <td><?php echo $product->price; ?></td>
              <td><?php echo $order->quantity; ?></td>
              <td><?php echo $order->price; ?></td>
            </tr>


            <?php
              // code...
            }

             ?>
        </thead>
        <tbody>
        </tbody>
    </table>





  </div>

</div>
<?php
  }
}else{
  redirect('orders.php');
}

 ?>

 <?php

 include_once('pagelayout/footer.php');

 ?>
