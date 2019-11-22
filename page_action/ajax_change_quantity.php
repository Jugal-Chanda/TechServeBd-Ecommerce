<?php
include_once('../include/init.php');


if(isset($_POST['password'])){
  if($_POST['password'] == "ajax1234"){
    $cart = Cart::find_by_id($_POST['cart_id']);
    $product = Product::find_by_id($cart->product_id);
    if($_POST['action'] == "inc"){
      $cart->quantity = $cart->quantity+1;
    }
    if($_POST['action'] == "dec"){
      if($cart->quantity > 1){
        $cart->quantity = $cart->quantity-1;
      }
    }

    $cart->price = $product->price*$cart->quantity;
    $cart->save();

  }else{
    echo "Error";
  }
}

 ?>
