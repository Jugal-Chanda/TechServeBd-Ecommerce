<?php

include_once('../include/init.php');

if(isset($_POST['login'])){
    echo "post";
    $user = User::verifyUser($_POST['email'],$_POST['password']);
    if($user == false){
        echo "Incorrect Email or Password";
    }else{
        echo $session->login($user);
        //echo "successfull Login";
        if($user->isadmin){
          redirect("../admin.php");
        }else{
          redirect("../index.php");
        }

    }
}else{
    redirect("../login.php");
}



?>
