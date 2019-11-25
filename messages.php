<?php

include_once('include/init.php');
include_once('pagelayout/header.php');
include_once('pagelayout/admin_is_signedin.php');
spacer(30);
include_once('pagelayout/second_header.php');
spacer(50);
include_once('pagelayout/adminnavbar.php');
spacer(50);

$messages = Contact::find_all();

?>


<div class="row">

  <div class="col-md-2 col-sm-0"></div>
  <div class="col-md-8 col-sm-12">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">message</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

          <?php

          if($messages != false){
            $sl = 1;
            foreach ($messages as $message) {
              ?>

              <tr>
                <th scope="row"><?php echo $sl; ?></th>
                <td><?php echo $message->name; ?></td>
                <td><?php echo $message->from_email_id; ?></td>
                <td><?php echo $message->subject; ?></td>
                <td><?php echo $message->msg; ?></td>
                <td class="text-center">
                  <a href="reply.php">Reply</a>
                </td>
              </tr>

              <?php
              $sl++;
            }
          }

           ?>

        </tbody>
    </table>

  </div>

</div>


<?php

include_once('pagelayout/footer.php');

?>
