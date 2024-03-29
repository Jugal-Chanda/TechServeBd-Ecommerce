<?php

include_once('include/init.php');
include_once('pagelayout/header.php');
include_once('pagelayout/admin_is_signedin.php');
spacer(30);
include_once('pagelayout/second_header.php');
spacer(50);
include_once('pagelayout/adminnavbar.php');
spacer(50);



if(isset($_POST['add_catagory'])){
    $category = new Category();
    $category->category_name = strtolower($_POST['catagory_name']);
    if(!$category->check_category_exist()){
        $category->save();
    }

}

if(isset($_POST['add_product'])){
    $product = new Product();
    $product->setfile($_FILES['product_image']);
    //echo $product->image;
    $product->name = $_POST['product_name'];
    $product->price = $_POST['product_price'];
    $product->brand = $_POST['brand_name'];
    $product->details = $_POST['product_details'];
    $product->category_id = $_POST['catagory_id'];
    $product->save();
}
?>

<div class="row">
    <div class="col-md-2 col-sm-0"></div>
    <div class="col-md-8 col-sm-12">
        <h2>Add Category</h2>
        <hr>
        <form action="admin.php" method="post">
            <div class="form-group">
                <label for="catagory">Catagory</label>
                <input type="text" class="form-control" id="catagory" aria-describedby="catagoryHelp" placeholder="Enter Catagory Name" name="catagory_name" required>
                <small id="catagoryHelp" class="form-text text-muted">Please Add different Catagory</small>
            </div>
            <button type="submit" class="btn btn-primary" name="add_catagory">Add Catagory</button>
        </form>
    </div>
</div>

<?php spacer(100); ?>


<div class="row">
    <div class="col-md-2 col-sm-0"></div>
    <div class="col-md-8 col-sm-12">
        <h2>Add Product</h2>
        <hr>
        <form action="admin.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" aria-describedby="productnameHelp" placeholder="Enter Product Name" name="product_name">
                <small id="productnameHelp" class="form-text text-muted">Please Check It before Submit</small>
            </div>
            <div class="form-group">
                <label for="productPrice">Product Price</label>
                <input type="number" class="form-control" id="productPrice" aria-describedby="productPriceHelp" placeholder="Enter Product Price" name="product_price" min="0">
                <small id="productPriceHelp" class="form-text text-muted">Please Check It before Submit</small>
            </div>
            <div class="form-group">
                <label for="catagory-select">Select a catregory</label>
                <select multiple class="form-control" id="catagory-select" name="catagory_id">
                    <?php

                    $categories = Category::find_all();
                    foreach($categories as $category){
                    ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->category_name ?></option>

                    <?php
                    }

                    ?>

                </select>
            </div>
            <div class="form-group">
                <label for="brandName">Brand Name</label>
                <input type="text" class="form-control" id="brandName" aria-describedby="bradndHelp" placeholder="Enter Brand Name" name="brand_name">
                <small id="bradndHelp" class="form-text text-muted">Please Check It before Submit</small>
            </div>
            <div class="form-group">
                <label for="productImage">Product Image</label>
                <input type="file" class="form-control" id="productImage" aria-describedby="producimageHelp" placeholder="Enter Product Image" name="product_image" min="0">
                <small id="producimageHelp" class="form-text text-muted">Please Check It before Submit</small>
            </div>
            <div class="form-group">
                <label for="product_details">Description</label>
                <textarea class="form-control" id="product_details" rows="3" name="product_details"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
        </form>
    </div>
</div>


<?php

include_once('pagelayout/footer.php');

?>
