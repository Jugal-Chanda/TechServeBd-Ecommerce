<?php
include '../include/init.php';
if($session->isSignedIn() ==  true){
  if(isset($_GET['id']) && $session->userId == $_GET['id']){
    if(isset($_POST['order'])){
      $order_no = Order::generate_order_no();
      $carts = Cart::find_all_cart_by_user($session->userId);
      if($carts == false){
        redirect('../shoppingcart.php');
      }
      foreach ($carts as $cart) {
        // code...
        $order = new Order();
        $order->order_no = $order_no;
        $order->product_id = $cart->product_id;
        $order->quantity = $cart->quantity;
        $order->price = $cart->price;
        $order->user_id = $cart->user_id;
        $order->delivery_address = $_POST['delivery_address'];
        if($_POST['payment_method'] == "bKash"){
          $order->delivery_method = $_POST['trxid'];
        }else{
          $order->delivery_method = $_POST['payment_method'];
        }

        $order->save();
        $cart->delete();
      }
    }
    //echo $order_no."adfad"."<br>";



    redirect('../shoppingcart.php');
  }
}




 ?>
