<?php
include_once("../include/init.php");
if(isset($_POST['contact_us'])){
  $name = $_POST['user_name'];
  $email = $_POST['email'];
  $message = $_POST['msg'];
  $subject = $_POST['subject'];

  $contact = new Contact();
  $contact->name = $name;
  $contact->from_email_id = $email;
  $contact->name = $name;
  $contact->subject = $subject;
  $contact->msg = $message;
  //echo $contact->msg;
  $contact->save();

  //redirect()

}



 ?>
