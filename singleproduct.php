<?php
include_once('include/init.php');
if(isset($_GET['id'])){
  $product = Product::find_by_id($_GET['id']);
  if(!$product){
    redirect($home_page_path);
  }
}else{
  redirect($home_page_path);
}
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
                    <img src="<?php echo $product->image;; ?>" alt="" style="height: 200px;width: 100%">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-7 col-sm-12">
                    <h4><?php echo $product->name; ?></h4>
                    <table style="border: none">
                        <tr>
                        <td><span>Brand:</span></td>
                        <td><a href="#"><?php echo $product->brand; ?></a></td>
                        </tr>

                        <tr>
                        <td><span>Availability:</span></td>
                        <td>100</td>
                        </tr>
                    </table>
                    <hr>
                    <small><?php echo $product->details ?></small>
                    <hr>
                    <div>
                        <h2>Price: <?php echo $product->price; ?> Tk</h2>
                    </div>
                    <form class="form-inline">
                    <label for="holder">Qty:&emsp;</label>
                    <div class="holder" id="holder">
                       <button>-</button>
                       <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="quantity" style="text-align: center">
                       <button>+</button>
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

                        $products = Product::find_all();
                        include_once("pagelayout/product.php");
                        product($products);

              ?>
            </div>
        </div>
    </div>








































<?php

include_once('include/footer.php');

?>
