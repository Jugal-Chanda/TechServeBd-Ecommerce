<?php

include 'include/init.php';
$order = new Order();
for($i=0;$i<1000;$i++){
  $order->generate_order_no();
  echo "<br>";
}


 ?>
