<?php


if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
    $protocol = "https://";   
else  
    $protocol = "http://";

$url= $_SERVER['REQUEST_URI'];
$server_name = $_SERVER['SERVER_NAME'];
$current_url = $protocol.$server_name.$url;
//echo $_SERVER['SERVER_NAME'];
?>