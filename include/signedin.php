<?php

include_once('init.php');

$loginpath = $protocol.$server_name."/".$folder."login.php";
if(!$session->isSignedIn()){
    redirect($loginpath);
}


?>