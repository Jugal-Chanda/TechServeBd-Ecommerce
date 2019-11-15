<?php

include_once('include/init.php');

include_once('include/header.php');
if(!$session->isSignedIn()){
    include_once('include/top_header.php');
    
}
spacer(30);

include_once('include/second_header.php');
spacer(50);
include_once('include/navbar.php');
spacer(50);

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
                    $orders = Order::find_all_order_for_user($session->userId);
                else
                    $orders = false;
                $sl = 1;
                if($orders != false){
                foreach($orders as $order){
            ?>
                <tr>
                    <th scope="row"><?php echo $sl; ?></th>
                    <td>
                        <div class="text-center">
                            <img src="<?php echo $order->product_image; ?>" class="rounded" alt="..." height="90">
                        </div>
                    </td>
                    <td>
                        <?php echo $order->product_name; ?>
                    </td>
                    <td>
                        <?php echo $order->product_price; ?>
                    </td>
                    <td class="text-center">
                        <a href="#"><i class="fa fa-minus fa-sm" aria-hidden="false" style="color: black;"></i></a>
                        
                            <?php echo $order->quantity; ?>
                        <a href="#"><i class="fa fa-plus fa-sm" aria-hidden="false" style="color: black;"></i></a>

                    </td>
                    <td>
                        <?php echo $order->price; ?>
                    </td>
                    <td>
                        <div class="text-center">
                            <a href="#?id=<?php echo $order->id; ?>">
                                <i class="fa fa-sync fa-2x" aria-hidden="false" style="color: black;"></i>
                            </a>
                            <a href="page_action/deleteorder.php?id=<?php echo $order->id; ?>">
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

include_once('include/footer.php');

?>
