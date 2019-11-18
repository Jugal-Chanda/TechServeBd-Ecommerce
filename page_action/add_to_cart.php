<?php

include_once('../include/init.php');
include_once('../include/signedin.php');

if(isset($_GET['id']) && $session->isSignedIn()){
    $product = Product::find_by_id($_GET['id']);
    $cart = new Cart();
    $cart->product_id = $_GET['id'];
    if(isset($_GET['q'])){
        $cart->quantity = $_GET['q'];
    }else{
        $cart->quantity = 1;
    }
    $cart->price = $product->price*$cart->quantity;
    $cart->user_id = $session->userId;
    $cart->save();
    redirect($home_page_path.DS."shoppingcart.php");
}else{

}

?>
