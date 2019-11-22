<?php

include_once("init.php");

class User extends Db_Object {
    protected static $db_table = "users";
    protected static $db_fields = array('name','from_email_id','subject','msg','reply');
    public $id;
    public $from_email_id;
    public $subject;
    public $msg;
    public $reply = 0;



}


?>
