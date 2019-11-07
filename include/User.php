<?php

include_once("init.php");

class User extends Db_Object {
    protected static $db_table = "users";
    protected static $db_fields = array('name','email','phone','password','address');
    public $id;
    public $name;
    public $email;
    public $phone;
    public $address;
    public $password;   
    
   
   
    
    /*---------------Authentication------------------*/
    public static function verifyUser($email,$password){
        $sql = "select * from ".self::$db_table." where email = '$email' and password = '$password' limit 1;";
        $result = self::findThisQuery($sql);
        return !empty($result)?array_shift($result):false;
    }
    
    
    
    
    
    
    
    
}


?>