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

<div class="row">
  <div class="col-md-2 col-sm-0"></div>
  <div class="col-md-8">
    <form class="form-inline" method="get">
      <div class="form-group mb-2 mx-sm-3">
        <input type="text" class="form-control " value="" placeholder="Search for Order ID" name="order_no">
      </div>
      <button type="submit" class="btn btn-primary mb-2" >Search</button>
    </form>
  </div>

</div>

<div class="row">
    <div class="col-md-2 col-sm-0"></div>
    <div class="col-md-8 col-sm-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order No</th>
                    <th scope="col">User Name</th>
                    <th scope="col">User Phone</th>
                    <th scope="col">User Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Delivery Method</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              <?php

              $orders = Order::find_all_undelivered_orders();
              if($orders!=false){
                $sl  = 1;
                foreach ($orders as $order) {
              ?>
              <tr>
                <th scope="row"><?php echo $sl; ?></th>
                <td><?php echo $order->order_no; ?></td>
                <td><?php echo $order->user_name; ?></td>
                <td><?php echo $order->user_phone; ?></td>
                <td><?php echo $order->user_email; ?></td>
                <td><?php echo $order->delivery_address; ?></td>
                <td><?php echo $order->delivery_method; ?></td>
                <td class="text-center"><a href="signleOrderAdmin.php?orderNo=<?php echo $order->order_no; ?> ">
                  <i class="fa fa-eye fa-sm" aria-hidden="false" style="color: black;"></i>
                </a></td>

              </tr>
              <?php
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
