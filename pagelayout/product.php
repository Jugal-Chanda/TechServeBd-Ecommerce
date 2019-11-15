<?php

function product($products){
?>
<style>
    .product_details {
        position: relative;
    }

    .add_cart_link {
        position: absolute;
        bottom: 5px;
    }

    .expand_product {
        position: absolute;
        bottom: 5px;
        right: 5px;
    }
</style>
<?php
      foreach ($products as $product) {?>
        <div class="col-lg-4 col-md-6 col-sm-12" style="height: 450px; padding-bottom: 5px;">
            <div class="card" style="width: 100%;height: 100%;">
                <img class="card-img-top" src="<?php echo $product->image; ?>" alt="Card image cap" style="height: 200px; width: 100%; padding-top: 10px;">
                <div class="card-body product_details">
                    <h5 class="card-title"><?php echo $product->name; ?></h5>
                    <h3>Price&emsp; <?php echo $product->price ?></h3>
                        <a href="page_action/placeOrder.php?id=<?php echo $product->id; ?>" class="btn btn-primary add_cart_link">Add Cart</a>
                        <a href="singleproduct.php?id=<?php echo $product->id; ?>" class="expand_product "><i class="fa fa-arrows-alt fa-2x " aria-hidden="false" style="color: black;"></i></a>

                        <!--<i class="fa fa-expand-alt fa-2x" aria-hidden="false" style="color: black;"></i>-->
                </div>
            </div>
        </div>
        <?php
      }
        // code...

}

?>
