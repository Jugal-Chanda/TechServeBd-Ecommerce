<?php
include_once('include/urls.php');
include_once('include/init.php');
include_once('include/functions.php');
include_once('include/header.php');
include_once('include/top_header.php');
spacer(30);
include_once('include/second_header.php');
spacer(50);
include_once('include/navbar.php');
spacer(50);
?>

<?php
  if(isset($_POST['register'])){
      $check = true;
      $user = new User();
      $user->name = $_POST['name'];
      $user->email = $_POST['email'];
      $user->phone = $_POST['phone'];
      $user->address = $_POST['address'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];
      if($password == $confirm_password){
          $user->password = $password;
      }
      else{
          $check = false;
          echo "Please make sure your password and confirm password is same";
      }
      
      if($check == true){
          $user->save();
      }
  }

?>


<div class="row">
    <div class="col-md-4 col-sm-0"></div>
    <div class="col-md-4 col-sm-12">
        <form action="registeruser.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name" name="name">
                    <small id="nameHelp" class="form-text text-muted">Please enter your full name</small>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNumber" aria-describedby="phoneHelp" placeholder="Enter Phone Number" name="phone">
                    <small id="phoneHelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="address">Current Address</label>
                    <input type="text" class="form-control" id="address"  placeholder="Enter your address" name="address">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Enter Password" name="password">
                    <small id="passwordHelp" class="form-text text-muted">Don't share your password with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" aria-describedby="confirm_passwordHelp" placeholder="Confirm Password" name="confirm_password">
                    <small id="confirm_passwordHelp" class="form-text text-muted">Rewrite your new password</small>
                </div>
                <button type="submit" class="btn btn-primary" name="register">Register</button>
            </form>
    </div>
    
</div>





    
<?php

include_once('include/footer.php');

?>
