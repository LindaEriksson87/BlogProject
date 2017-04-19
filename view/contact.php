<?php

include '../controllers/display.php';
include '../controllers/login.php';
include 'templates/userFunctions.php';
use function controllers\display\display;

require_once '../model/connection.php';


if(isset($_POST['email'])) {
 
    // email to send to & subject line
    //$email_to = "lejohnson75@gmail.com";
    $email_to = "linda.nibelheim@gmail.com";
    $email_subject = "A Message to Get Into Techno";
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
    
    $filteredFirstname = filter_input(INPUT_POST,'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $first_name = trim($filteredFirstname);
    
    $filteredLastname = filter_input(INPUT_POST,'last_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name = trim($filteredLastname); 
    
    $filteredEmail = filter_input(INPUT_POST,'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $email_from = trim($filteredEmail); 
    
    $filteredMessage = filter_input(INPUT_POST,'message', FILTER_SANITIZE_SPECIAL_CHARS);
    $message = trim($filteredMessage); 
 
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
    
        //$error[] = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    
    /*function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        trigger_error();
    }*/
 
 
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        $error[] = 'We are sorry, but there appears to be a problem with the form you submitted.';       
    }
 
 
  if(!preg_match($email_exp,$email_from)) {
    $error[] = 'The Email Address you entered does not appear to be valid.';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error[] = 'The First Name you entered does not appear to be valid.';
  }
  
  if(!preg_match($string_exp,$last_name)) {
    $error[] = 'The Last Name you entered does not appear to be valid.';
  }
 
 
  if(strlen($message) < 2) {
    $error[] = 'The Comments you entered do not appear to be valid.';
  }
 
  /*if(strlen($error_message) > 0) {
    died($error_message);
  }*/

    
 else if (!isset($error)){
    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);  
    $sent = 'success';
 }

} 
 ?>
 

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Page - Get Into Techno</title>

<!--Including Bootstrap CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="CSS/additionalCSS.css">
<link href="https://fonts.googleapis.com/css?family=Geostar+Fill|Raleway|Roboto|Stalinist+One" rel="stylesheet">
</head>


<body>
    
<?php 

// Displaying the nav bar with a login form or logout button depending on if the user session is set or not.
if($user->is_loggedin()!="")
{
    echo controllers\display\display('nav_bar_signed_in'); 
}
else 
{
    echo controllers\display\display('nav_bar_signed_out'); 
}
?>
    
<h2 class='tech-center'>Contact</h2>
    <div class="col-sm-2"></div>

    <div class="row well well-lg col-sm-8 justify-content-center">

<p>If you want to get in touch with the webmaster, fill in the form below...</p>

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
            else if(isset($sent))
            {
                 ?>
                 <div class="alert alert-success">
                      <i class="glyphicon glyphicon-ok"></i> &nbsp; Thank you for contacting Get Into Techno. 
                      We will be in touch with you very soon.
                </div>
                 <?php
            }
            ?>
           <?php echo controllers\display\display('contact_form'); ?>
            <br />
        </form>
 </div>
    <div class='col-sm-12'>
    <?php echo controllers\display\display('footer') ?>
    </div>
</body>
</html>