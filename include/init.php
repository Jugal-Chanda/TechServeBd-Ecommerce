<?php



/*
define('SITE_ROOT',DS.'APPLICATIONS'.DS.'XAMPP' .........);
*/
include_once('plugins/PHPMailer/PHPMailerAutoload.php');
include_once('urls.php');
$files = array('functions','config','Database','Db_Object','Category','Product','User',
'Session','Order','Cart','Contact'
);

foreach ($files as $value) {
  // code...
  //echo $home_page_path."<br>";
  $path = $server_root.DS.$folder."include".DS.$value.".php";
  //echo $path."<br>";
  include_once($path);
}


// include_once('functions.php');
// include_once('config.php');
// include_once('Database.php');
// include_once('Db_Object.php');
// include_once('Category.php');
// include_once('Product.php');
// include_once('User.php');
// include_once('Session.php');
//
// include_once('Order.php');
include_once($server_root.DS.$folder.'pagelayout/logout.php');




?>
