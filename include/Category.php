<?php

include_once("init.php");

class Category extends Db_Object {
    protected static $db_table = "categories";
    protected static $db_fields = array('category_name');
    public $id;
    public $category_name;
    
    /*** check duplicate call_no **/
    
    public function  check_category_exist(){
        return (self::find_category($this->category_name)) == false ? false : true;
    }
    
    public static function  find_category($category){
        $sql = "select * from ".static::$db_table." where category_name = '$category' limit 1;";
        $result = static::findThisQuery($sql);
        return !empty($result)?array_shift($result):false;
    }
   /* 
    public function  check_book_call_no($call_no){
        return (self::find_book_by_call_no($call_no)) == false ? false : true;
    }
   
    public function issue_book($student){
        global $db;
        $sql = "insert into issued_books (book_id,student_id) values('$this->id','$student->id');";
        if($db->query($sql)){
            echo "successfuly insert";
        }
    }
    
    */
    
    
    
    
    
    
}


?>