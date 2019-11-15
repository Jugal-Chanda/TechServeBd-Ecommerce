<?php
//include_once('include/urls.php');
include_once('include/init.php');

include_once('pagelayout/header.php');
include_once('pagelayout/top_header.php');
spacer(30);
include_once('pagelayout/second_header.php');
spacer(50);
include_once('pagelayout/navbar.php');
spacer(50);


?>

<div class="row">
    <div class="col-md-4 col-sm-0"></div>
    <div class="col-md-4 col-sm-12">
        <form action="page_action/login_action.php" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>
    </div>

</div>


<?php

include_once('pagelayout/footer.php');

?>
