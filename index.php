<?php

include_once('include/init.php');

include_once('pagelayout/header.php');
if(!$session->isSignedIn()){
    include_once('pagelayout/top_header.php');
}else{
  $user = User::find_by_id($session->userId);
  //echo $user->name;
  logoutOption($user);
}
spacer(30);

include_once('pagelayout/second_header.php');
spacer(50);
include_once('pagelayout/navbar.php');
spacer(50);

?>


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
                        include_once("pagelayout/product.php");
                        product($products);

                        ?>
                </div>
            </div>
        </div>
    </div>
    </div>


<?php

include_once('pagelayout/footer.php');

?>
