<?php

include_once('../include/init.php');
include_once('../include/signedin.php');
if(isset($_GET['id'])){
    $order = Order::find_by_id($_GET['id']);
    $order->delete();
    redirect($home_page_path."shoppingcart.php");
}

?>