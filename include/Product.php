<?php


include_once('init.php');


class Product extends Db_Object {
    protected static $db_table = "products";
    protected static $db_fields = array('name','image','price','brand','details','category_id');
    public $id;
    public $name;
    public $image;
    public $price;
    public $brand;
    public $details;
    public $category_id;
    
    /*** check duplicate call_no **/
    
    public function setfile($file){
        $target_dir = "images/";
        $target_file = $target_dir .time(). basename($file["name"]);
        echo $target_file;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        
        if ($file["size"] > 5000000) {
            echo "Sorry, your file is too large. ".$file["size"];
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed . ";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                echo "The file ". basename( $file["name"]). " has been uploaded.";
                $this->image = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        
    }
    
    public static function  find_by_category($category){
        $sql = "select * from ".static::$db_table." where category_id = '$category';";
        $result = static::findThisQuery($sql);
        return !empty($result)?$result:false;
    }
   
    
    
    
    
    
}


?>