<?php

include_once('../include/init.php');
include_once('../include/signedin.php');


if(isset($_GET['id']) && $session->isSignedIn()){
    $product = Product::find_by_id($_GET['id']);
    $order = new Order();
    $order->product_id = $_GET['id'];
    if(isset($_GET['q'])){
        $order->quantity = $_GET['q'];
    }else{
        $order->quantity = 1;
    }    
    $order->price = $product->price*$order->quantity;
    $order->delivered = false;
    $order->user_id = $session->userId;
    $order->save();
    redirect($home_page_path);
}else{
    
}

?>