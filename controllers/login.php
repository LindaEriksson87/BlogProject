<?php
//include '../controllers/display.php';
//use function controllers\display\display;

require_once '../model/connection.php';

session_start();

/*if($user->is_loggedin()!="")
{
 $user->redirect('index.php');
}*/

if(isset($_POST['btn-login']))
{
 $user_name = $_POST['txt_uname_email'];
 $email = $_POST['txt_uname_email'];
 $password = $_POST['txt_password'];
  
 if($user->login($user_name,$email,$password)==true)
 {
  header("Refresh:0");
 }
 else
 {
  $error = "Your username or password is incorrect.";
 } 
} 
?>
