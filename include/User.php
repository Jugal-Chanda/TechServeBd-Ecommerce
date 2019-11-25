<?php

include_once("init.php");

class User extends Db_Object {
    protected static $db_table = "users";
    protected static $db_fields = array('name','email','phone','password','address','isadmin');
    public $id;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $password;
    public $isadmin = false;




    public static function find_user_details_by_order_no($order_no){
      $order = Order::find_all_order_by_order_no($order_no);
      $tmp = array_shift($order);
      $user = self::find_by_id($tmp->user_id);
      return $user;
    }
    /*---------------Authentication------------------*/
    public static function verifyUser($email,$password){
        $sql = "select * from ".self::$db_table." where email = '$email' and password = '$password' limit 1;";
        $result = self::findThisQuery($sql);
        return !empty($result)?array_shift($result):false;
    }








}


?>
