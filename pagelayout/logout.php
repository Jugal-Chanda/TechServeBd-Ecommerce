<?php

function logoutOption($user){
?>

<div class="row" style="">
 <div class="col-md-2 col-sm-0"></div>
 <div class=" col-sm-6">
     <span>Welcome <?php echo $user->name; ?></span> <a href="page_action/logout.php" id="" class="">Logout</a>
 </div>
</div>
<?php

}

?>
