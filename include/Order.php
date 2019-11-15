<?php

include_once("init.php");

class Order extends Db_Object {
    protected static $db_table = "orders";
    
    protected static $db_fields = array('product_id','quantity','price','delivered','user_id');
    public $id;
    public $product_id;
    public $quantity;
    public $price;
    public $delivered; 
    public $user_id;
    
    public $product_image;
    public $product_price;
    public $product_name;
    
    public static function find_all_order_for_user($userId){
        $sql = "select orders.id as id, product_id, quantity, orders.price as price, delivered, 
        user_id, products.name as product_name, products.price as product_price, products.image as product_image 
        from ".static::$db_table.",products 
        where orders.user_id = '$userId' and products.id = orders.product_id;";
        
        $result = static::findThisQuery($sql);
        return !empty($result)?$result:false;
    }
   
}


?>