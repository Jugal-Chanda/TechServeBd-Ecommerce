<?php

defined('DS') ? null : define('DS',DIRECTORY_SEPARATOR);
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $protocol = "https://";
else
    $protocol = "http://";

$url= $_SERVER['REQUEST_URI'];
$server_name = $_SERVER['SERVER_NAME'];
$folder = "ecommerce".DS;
$current_url = $protocol.$server_name.$url;
$home_page_path = $protocol.$server_name.DS.$folder;
$server_root = $_SERVER['DOCUMENT_ROOT'];
//echo $_SERVER['SERVER_NAME'];
?>
