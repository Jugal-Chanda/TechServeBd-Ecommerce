<?php
include_once("init.php");

class Cart extends Db_Object {
    protected static $db_table = "carts";

    protected static $db_fields = array('product_id','quantity','price','user_id');
    public $id;
    public $product_id;
    public $quantity;
    public $price;
    public $user_id;
    public $product_image;
    public $product_price;
    public $product_name;
    public $cart_total_price;

    public static function find_all_cart_by_user($userId){
        $sql = "select ".static::$db_table.".id as id, product_id, quantity, ".static::$db_table.".price as price,
        user_id, products.name as product_name, products.price as product_price, products.image as product_image
        from ".static::$db_table.",products
        where ".static::$db_table.".user_id = '$userId' and products.id = ".static::$db_table.".product_id;";

        $result = static::findThisQuery($sql);
        return !empty($result)?$result:false;
    }

    public static function total_cart_price_for_user($userId){
      $sql = "Select sum(price) as cart_total_price from ".static::$db_table." where user_id = '$userId'";
      $result = static::findThisQuery($sql);
      return !empty($result)?array_shift($result):false;

    }
  }


  ?>
