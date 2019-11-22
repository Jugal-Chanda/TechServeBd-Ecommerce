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

<div class="row">
  <div class="col-md-2 col-sm-0"> </div>
  <div class="col-md-8 col-sm-12">

    <form action="" method="post">
      <div class="row">
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name">
          </div>
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email">
          </div>
        </div>

      </div>
      <div class="form-group">
        <label for="details">Description</label>
        <textarea class="form-control" id="details" rows="7"></textarea>
      </div>
      <div class="text-center">
        <a href="" class="btn btn-info" name="contact_us">Submit</a>
      </div>

    </form>

  </div>

</div>


<?php

include_once('pagelayout/footer.php');

?>
