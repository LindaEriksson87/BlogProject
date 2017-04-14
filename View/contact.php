<?php

include '../controllers/display.php';
include '../controllers/login.php';
include 'templates/userFunctions.php';
use function controllers\display\display;

require_once '../model/connection.php';

/*if($user->is_loggedin()!="")
{
    $user->redirect('index.php');
}*/

if(isset($_POST['btn-send']))
{
   $filteredFullname = filter_input(INPUT_POST,'txt_fullname', FILTER_SANITIZE_SPECIAL_CHARS);
   $fullname_name = trim($filteredFirstname);
   
   $filteredEmail = filter_input(INPUT_POST,'txt_email', FILTER_SANITIZE_EMAIL);
   $email = trim($filteredEmail);
   
   $filteredMessage = filter_input(INPUT_POST,'txt_message', FILTER_SANITIZE_SPECIAL_CHARS);
   $message = trim($filteredMessage);
   
   
   if($fullname_name=="") {
      $error[] = "Please provide a name."; 
   }
   else if($email=="") {
      $error[] = "Please provide an email address."; 
   }
   else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address.';
   }
   else if($message=="") {
      $error[] = "Please enter a message.";
   }
  else {
      echo "Message has been sent";
  }// May need to add additional code
?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Page - Get Into Techno</title>

<!--Including Bootstrap CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  crossorigin="anonymous">

</head>


<body>
    
<?php 

// Displaying the nav bar with a login form or logout button depending on if the user session is set or not.
if($user->is_loggedin()!="")
{
    echo Controllers\display\display('nav_bar_signed_in'); 
}
else 
{
    echo Controllers\display\display('nav_bar_signed_out'); 
}
?>
    

<h1>Contact Page</h1>

<p>Some text</p>

<div class="col-sm-8">
        <form method="post">
            <?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                  </div>
                  <?php
               }
            }
            else if(isset($_GET['sent']))
            {
                 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Message has been sent <a href='index.php'>login</a> here
                 </div>
                 <?php
            }
            ?>
           <?php echo Controllers\display\display('contact_form'); ?>
            <br />
        </form>
 </div>
</body>
</html>