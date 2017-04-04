<?php
include 'controllers/display.php';
use function controllers\display\display;

require_once 'model\connection.php';

if($user->is_loggedin()!="")
{
    $user->redirect('index.php');
}

if(isset($_POST['btn-signup']))
{
   
   $first_name = trim($_POST['txt_fname']);
   $last_name = trim($_POST['txt_lname']);
   $user_name = trim($_POST['txt_uname']);
   $email = trim($_POST['txt_umail']);
   $password = trim($_POST['txt_upass']); 
 
   if($user_name=="") {
      $error[] = "Please provide a username."; 
   }
   else if($email=="") {
      $error[] = "Please provide an email address."; 
   }
   else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address.';
   }
   else if($password=="") {
      $error[] = "Please enter a password.";
   }
   else if(strlen($password) < 6){
      $error[] = "Password must be at least 6 characters"; 
   }
   else
   {
      try
      {
         $stmt = $pdo->prepare("SELECT user_name,email FROM users WHERE user_name=:user_name OR email=:email");
         $stmt->execute(array(':user_name'=>$user_name, ':email'=>$email));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if($row['user_name']==$user_name) {
            $error[] = "Username already taken.";
         }
         else if($row['email']==$email) {
            $error[] = "This email address is already registered.";
         }
         else
         {
            if($user->register($first_name,$last_name,$user_name,$email,$password)) 
            {
                $user->redirect('index.php');
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign up</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css"  />
</head>
<body>
<div class="container">
     <div class="form-container">
        <form method="post">
            <h2>Sign up.</h2><hr />
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
            else if(isset($_GET['joined']))
            {
                 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php
            }
            ?>
           <?php echo Controllers\display\display('register_form'); ?>
            <br />
            <label>have an account? <a href="login.php">Sign In</a></label>
        </form>
       </div>
</div>

</body>
</html>

