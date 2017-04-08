<?php
include '../controllers/display.php';
use function controllers\display\display;

require_once '../model/connection.php';

if($user->is_loggedin()!="")
{
 $user->redirect('index.php');
}

if(isset($_POST['btn-login']))
{
 $user_name = $_POST['txt_uname_email'];
 $email = $_POST['txt_uname_email'];
 $password = $_POST['txt_password'];
  
 if($user->login($user_name,$email,$password)==true)
 {
  $user->redirect('index.php');
 }
 else
 {
  $error = "Your username or password is incorrect.";
 } 
} 
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>
<div class="container">
     <div class="form-container">
        <form method="post">
            <h2>Sign in.</h2><hr />
            <?php
            if(isset($error))
            {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                  </div>
                  <?php
            }
            ?>
                <?php echo Controllers\display\display('login_form'); ?>
            <br />
            <label>Don't have account yet? <a href="register.php">Sign Up</a></label>
        </form>
       </div>
</div>

</body>
</html>