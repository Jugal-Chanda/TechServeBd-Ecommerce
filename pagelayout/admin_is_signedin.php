<?php

if($session->isSignedIn() == false || $session->isadmin() == false){
  redirect('login.php');
}else{
  $user = User::find_by_id($session->userId);
  logoutOption($user);
}




 ?>
