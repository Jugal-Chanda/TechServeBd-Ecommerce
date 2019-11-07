<?php

include_once("init.php");
if(isset($_GET['category'])){
    $products = Product::find_by_category($_GET['category']);
}else{
  $products = Product::find_all();  
}


foreach($products as $product){

?>

<div class="col-lg-4 col-md-6 col-sm-12" style="height: 450px; padding-bottom: 5px;">
    <div class="card" style="width: 100%;height: 100%;">
        <img class="card-img-top" src="<?php echo $product->image; ?>" alt="Card image cap" style="height: 200px; width: 100%; padding-top: 10px;">
        <div class="card-body product_details">
            <h5 class="card-title"><?php echo $product->name; ?></h5>
            <h3>Price&emsp; <?php echo $product->price ?></h2>
                <a href="#" class="btn btn-primary add_cart_link">Add Cart</a>
        </div>
    </div>
</div>




<?php
}
?>