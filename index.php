<?php

include_once('include/init.php');

//echo $session->isSignedIn();
if(!$session->isSignedIn()){
    //redirect('login.php');
    
    
}else{
    
}
include_once('include/header.php');

include_once('include/top_header.php');
spacer(30);
include_once('include/second_header.php');
spacer(50);
include_once('include/navbar.php');
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
                        <?php include_once('include/products_page.php');  ?>   
                </div>
            </div>
        </div>
    </div>
    </div>
    
    
<?php

include_once('include/footer.php');

?>
