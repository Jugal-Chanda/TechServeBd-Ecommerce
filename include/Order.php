<?php

include_once("init.php");

class Order extends Db_Object {
    protected static $db_table = "orders";

    protected static $db_fields = array('order_no','product_id','quantity','price','delivered','user_id','delivery_address',
    'delivery_method');
    public $id;
    public $order_no;
    public $product_id;
    public $quantity;
    public $price;
    public $delivered = false;
    public $user_id;
    public $delivery_address;
    public $delivery_method;


    public $order_total_price;
    public $product_name;
    public $user_name;
    public $user_phone;
    public $user_email;



    public static function generate_order_no(){
      $num_str = sprintf("%06d", mt_rand(1, 999999));
      return $num_str;
    }

    // public static function find_all_order(){
    //     $sql = "select orders.id as id, product_id, quantity, orders.price as price, delivered,
    //     user_id, products.name as product_name, products.price as product_price, products.image as product_image
    //     from ".static::$db_table.",products
    //     where orders.user_id = '$userId' and products.id = orders.product_id;";
    //
    //     $result = static::findThisQuery($sql);
    //     return !empty($result)?$result:false;
    // }

    public static function find_all_undelivered_orders(){

      $sql = "select  distinct users.name as user_name, users.phone as user_phone,
      users.email as user_email, orders.delivery_address,orders.delivery_method, orders.order_no from "
      .static::$db_table.", users where users.id = orders.user_id and delivered = '0';";
      $result = static::findThisQuery($sql);
      return !empty($result)?$result:false;
    }

    public static function find_all_delivered_orders(){

      $sql = "select  distinct users.name as user_name, users.phone as user_phone,
      users.email as user_email, orders.delivery_address,orders.delivery_method, orders.order_no from "
      .static::$db_table.", users where users.id = orders.user_id and delivered = '1';";
      $result = static::findThisQuery($sql);
      return !empty($result)?$result:false;
    }

    public static function find_all_order_by_order_no($orderId){
          $sql = "select * from ".static::$db_table." where orders.order_no = '$orderId';";
          $result = static::findThisQuery($sql);
          return !empty($result)?$result:false;
    }

    public static function total_order_price($order_no){
      $sql = "select sum(price) as order_total_price from orders where order_no = '$order_no';";
      $result = static::findThisQuery($sql);
      return !empty($result)? array_shift($result):false;
    }

    public static function find_all_order_by_user($userId){
      $sql = "select  distinct users.name as user_name, users.phone as user_phone,
      users.email as user_email, orders.delivery_address,orders.delivery_method, delivered, orders.order_no from "
      .static::$db_table.", users where users.id = orders.user_id and orders.user_id = '$userId';";
      $result = static::findThisQuery($sql);
      return !empty($result)?$result:false;

    }

}


?>
