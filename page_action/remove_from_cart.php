<?php

include_once('../include/init.php');
include_once('../include/signedin.php');
if(isset($_GET['id'])){
    $cart = Cart::find_by_id($_GET['id']);
    $cart->delete();
    redirect($home_page_path."shoppingcart.php");
}

?>
