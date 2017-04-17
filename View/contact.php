<?php

include '../controllers/display.php';
include '../controllers/login.php';
include 'templates/userFunctions.php';
use function controllers\display\display;

require_once '../model/connection.php';


if(isset($_POST['email'])) {
 
    // email to send to & subject line
    $email_to = "lejohnson75@gmail.com";
    $email_subject = "A Message to Get Into Techno";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        trigger_error();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name']; 
    $email_from = $_POST['email']; 
    $message = $_POST['message']; 
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
 
  if(strlen($message) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
Thank you for contacting Get Into Techno. 
                      We will be in touch with you very soon.
 
 <?php
} 
 ?>
 

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Page - Get Into Techno</title>

<!--Including Bootstrap CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  crossorigin="anonymous">
<link rel="stylesheet" href="CSS/additionalCSS.css">
<link href="https://fonts.googleapis.com/css?family=Geostar+Fill|Stalinist+One" rel="stylesheet">
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
    

<h1>Contact</h1>

<p>If you want to get in touch with the webmaster, fill in the form below...</p>

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
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Thank you for contacting Get Into Techno. 
                      We will be in touch with you very soon.
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