<?php
include_once('include/init.php');
include_once('include/header.php');
include_once('include/top_header.php');
spacer(30);
include_once('include/second_header.php');
spacer(50);
include_once('include/navbar.php');
spacer(50);
?>


<div class="row">
        <div class="col-md-2 col-sm-0"></div>
        <div class="col-md-8 col-sm-12">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <img src="images/logo.png" alt="" style="height: 200px;width: 100%">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-7 col-sm-12">
                    <h4>Product Name</h4>
                    <table style="border: none">
                        <tr>
                        <td><span>Brand:</span></td>
                        <td><a href="#">abcd</a></td>
                        </tr>
                        
                        <tr>
                        <td><span>Product Code:</span></td>
                        <td><a href="#">abcd</a></td>
                        </tr>
                        
                        <tr>
                        <td><span>Availability:</span></td>
                        <td>100</td>
                        </tr>
                    </table>
                    <hr>
                    <small>6000 Count True RMS Digital Multimeter Red Yellow, Blue & Black Colour.</small>
                    <hr>
                    <div>
                        <h2>Price: 5000 Tk</h2>
                    </div>
                    <form class="form-inline">
                    <label for="holder">Qty:&emsp;</label>
                    <div class="holder" id="holder">
                       <button>-</button><input type="text" name="quantity" value="1" size="2" id="input-quantity" class="quantity" style="text-align: center"><button>+</button>
                    </div> 
                    </form>    
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-2 col-sm-0"></div>
        <div class="col-md-8 col-sm-12"><h3>Others Products</h3></div>
    </div>
    
    <hr>
    
    
    <div class="row">
        <div class="col-md-2 col-sm-0"></div>
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
    
   
  
 




































<?php

include_once('include/footer.php');

?>