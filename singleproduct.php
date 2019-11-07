<?php
include_once('include/functions.php');
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
               <?php include_once('include/products_page.php');  ?>
            </div>
        </div>
    </div>
    
   
  
 




































<?php

include_once('include/footer.php');

?>