<?php

include_once('include/init.php');

include_once('pagelayout/header.php');
if(!$session->isSignedIn()){
  redirect("login.php");
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

$user = User::find_by_id($session->userId);


  if(isset($_POST['upload'])){
      $check = true;
      $user->name = $_POST['name'];
      $user->email = $_POST['email'];
      $user->phone = $_POST['phone'];
      $user->address = $_POST['address'];
      if($_POST['c_password'] != null){
        if($_POST['c_password'] == $user->password){
          if($_POST['n_password'] == $_POST['confirm_password']){
            $user->password = $_POST['n_password'];
          }
        }
      }else{
        //echo "No";
      }
      $user->save();
  }

?>


<div class="row">
    <div class="col-md-4 col-sm-0"></div>
    <div class="col-md-4 col-sm-12">
        <form action="" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name" value="<?php echo $user->name;?>" name="name">
                    <small id="nameHelp" class="form-text text-muted">Please enter your full name</small>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $user->email;?>" name="email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNumber" aria-describedby="phoneHelp" placeholder="Enter Phone Number" value="<?php echo $user->phone;?>" name="phone">
                    <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="address">Current Address</label>
                    <input type="text" class="form-control" id="address"  placeholder="Enter your address" value="<?php echo $user->address;?>" name="address">
                </div>
                <div class="form-group">
                    <label for="password">Current Password</label>
                    <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter Your Current Password " name="c_password">
                    <small id="passwordHelp" class="form-text text-muted">Don't share your password with anyone else. For confirmation enter your current password</small>
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter Password" name="n_password">
                    <small id="passwordHelp" class="form-text text-muted">Don't share your password with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" aria-describedby="confirm_passwordHelp" placeholder="Confirm Password" name="confirm_password">
                    <small id="confirm_passwordHelp" class="form-text text-muted">Rewrite your new password</small>
                </div>
                <button type="submit" class="btn btn-primary" name="upload">Register</button>
            </form>
    </div>

</div>





<?php

include_once('pagelayout/footer.php');

?>
