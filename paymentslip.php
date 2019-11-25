<?php

include_once('include/init.php');

include_once('pagelayout/header.php');
if(!$session->isSignedIn()){
    include_once('pagelayout/top_header.php');
}else{
  $user = User::find_by_id($session->userId);
  //echo $user->name;
  logoutOption($user);
}
spacer(30);

include_once('pagelayout/second_header.php');
spacer(50);
include_once('pagelayout/navbar.php');
spacer(50);

?>


<?php

if(isset($_GET['orderno'])){
  $tmp = $orders = Order::find_all_order_by_order_no($_GET['orderno']);
  $user = User::find_user_details_by_order_no($_GET['orderno']);
  if($orders!=false){
    $tmp_order = array_shift($tmp);
    ?>

<?php include_once('pagelayout/payment_slip.php'); ?>

<?php
  }
}
 ?>

 <script type="text/javascript" src="js/paymentslip.js"></script>

<?php
include_once('pagelayout/footer.php');

?>
