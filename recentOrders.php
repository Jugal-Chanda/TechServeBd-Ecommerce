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


<div class="row">
    <div class="col-md-2 col-sm-0"></div>
    <div class="col-md-8 col-sm-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

              <?php
              if($session->isSignedIn()){
                $orders = Order::find_all_order_by_user($session->userId);
              }else{
                $orders = false;
              }

              if($orders!=false){
                $sl = 1;
                foreach ($orders as $order) {
                  $order_total_price = Order::total_order_price($order->order_no);
              ?>
              <tr>
                <th scope="row"><?php echo $sl; ?></th>
                <td><?php echo $order->order_no; ?></td>
                <td><?php echo $order->order_date(); ?></td>
                <td><?php echo $order->user_name; ?></td>
                <td><?php echo $order->user_phone; ?></td>
                <td><?php echo $order->user_email; ?></td>
                <td><?php echo $order->delivery_address; ?></td>
                <td>
                  <?php if($order->delivered == false){
                    echo "<b>Panding</b>";
                  } else{
                    echo "<b>Delivered</b>";
                  }?>
                </td>
                <td><?php echo $order_total_price->order_total_price; ?></td>
                <td class="text-center">
                  <a href="singleorder.php?id=<?php echo $order->order_no; ?>"><i class="fa fa-eye fa-sm" aria-hidden="false" style="color: black;"></i></a>

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
