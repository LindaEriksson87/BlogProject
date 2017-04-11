<?php
include '../controllers/display.php';
include '../controllers/login.php';
use function controllers\display\display;

require_once '../model/connection.php';


if($user->is_loggedin()!="")
{
    $user->redirect('index.php');
}

if(isset($_POST['btn-signup']))
{
   $filteredFirstname = filter_input(INPUT_POST,'txt_fname', FILTER_SANITIZE_SPECIAL_CHARS);
   $first_name = trim($filteredFirstname);
   
   $filteredLastname = filter_input(INPUT_POST,'txt_lname', FILTER_SANITIZE_SPECIAL_CHARS);
   $last_name = trim($filteredLastname);
   
   $filteredUsername = filter_input(INPUT_POST,'txt_uname', FILTER_SANITIZE_SPECIAL_CHARS);
   $user_name = trim($filteredUsername);
   
   $filteredEmail = filter_input(INPUT_POST,'txt_umail', FILTER_SANITIZE_EMAIL);
   $email = trim($filteredEmail);
   
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
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<!--Including Bootstrap CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
<div>
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
        </form>
 </div>

</body>
</html>

