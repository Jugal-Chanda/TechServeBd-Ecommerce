<?php
include_once("../include/init.php");
if(isset($_GET['orderno'])){

  $orders = Order::find_all_order_by_order_no($_GET['orderno']);
  foreach ($orders as $order) {
    $order->delete();
  }
}
redirect("../orders.php");

 ?>
