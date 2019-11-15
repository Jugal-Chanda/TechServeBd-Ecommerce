<?php

include_once('include/init.php');

include_once('include/header.php');
if(!$session->isSignedIn()){
    include_once('include/top_header.php');
    
}
spacer(30);

include_once('include/second_header.php');
spacer(50);
include_once('include/navbar.php');
spacer(50);

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

<!--Catagory and Products-->
    <div class="row">
        <div class="col-md-2 col-sm-0"></div>
        <div class="col-md-8 col-sm-12">
           
            <div class="row">
               <!-- Catagories  -->
                <div class="col-md-4 col-sm-12">
                  <!-- Catagories  -->
                   <h2>Catagories</h2>
                    <!--Spacer-->
                   <div style="height: 20px;"></div>
                    <table class="table table-hover">
                        <tbody>
                          <tr>
                              <th scope="row">
                                  <a href="<?php echo 'index.php'?>">All</a>
                              </th>
                          </tr>
                           <?php
                            $categories = Category::find_all();

                            foreach($categories as $category){
                            ?>
                            <tr>
                                <th scope="row">
                                   <a href="<?php echo "index.php?category=".$category->id; ?>"><?php echo ucwords($category->category_name); ?></a>
                                    
                                </th>
                            </tr>


                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Product -->
                <div class="col-md-8 col-sm-12">
                    <div class="row">
                        <?php
                        
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
                                    <h3>Price&emsp; <?php echo $product->price ?></h3>
                                    <a href="page_action/placeOrder.php?id=<?php echo $product->id; ?>" class="btn btn-primary add_cart_link">Add Cart</a>
                                    <a href="singleproduct.php?id=<?php echo $product->id; ?>" class="expand_product "><i class="fa fa-arrows-alt fa-2x " aria-hidden="false" style="color: black;"></i></a>

                                    <!--<i class="fa fa-expand-alt fa-2x" aria-hidden="false" style="color: black;"></i>-->
                                </div>
                            </div>
                        </div>




                        <?php
}
?>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    
<?php

include_once('include/footer.php');

?>
