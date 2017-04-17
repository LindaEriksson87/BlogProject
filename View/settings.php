<?php
include '../controllers/display.php';
include '../controllers/login.php';
include 'templates/userFunctions.php';
use function controllers\display\display;

require_once '../model/connection.php';


if(isset($_POST['btn-update']))
{
   $filteredFirstname = filter_input(INPUT_POST,'txt_fname', FILTER_SANITIZE_SPECIAL_CHARS);
   $first_name = trim($filteredFirstname);
   
   $filteredLastname = filter_input(INPUT_POST,'txt_lname', FILTER_SANITIZE_SPECIAL_CHARS);
   $last_name = trim($filteredLastname);
   
   $filteredUsername = filter_input(INPUT_POST,'txt_uname', FILTER_SANITIZE_SPECIAL_CHARS);
   $user_name = trim($filteredUsername);
   
   $filteredEmail = filter_input(INPUT_POST,'txt_umail', FILTER_SANITIZE_EMAIL);
   $email = trim($filteredEmail);
   
   if($user_name=="") {
      $error[] = "Please provide a username."; 
   }
   
   if($email=="") {
      $error[] = "Please enter a valid email address."; 
   }
   
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error[] = 'Please enter a valid email address.';
   }
   
   else
   {
      try
      {
         $stmt = $pdo->prepare("SELECT user_name,email FROM users WHERE user_name=:user_name OR email=:email");
         $stmt->execute(array(':user_name'=>$user_name, ':email'=>$email));
         $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
         if ($row['user_name']!=$_SESSION['username']){
             
            if($row['user_name']==$user_name) {
                $error[] = "Username already taken.";
            }
         }
         // the already registered email error is displaying even if the field is blank 
         
         else if($row['email']!=$thisUserEmail){
             if ($row['email']==$email) {
                $error[] = "This email address is already registered.";
                }
         }
         else
         {
            if($user->update($first_name,$last_name,$user_name,$email,$password))
            {
                header("Refresh:0");
            }
         }
     }
     catch(PDOException $e)
     {
        echo $e->getMessage();
     }
  } 
}

if(isset($_POST['btn-password']))
{
   $password = trim($_POST['txt_upass']); 
    
   if($password=="") {
      $error[] = "Please enter a password.";
   }
   
   if(strlen($password) < 6){
      $error[] = "Password must be at least 6 characters"; 
   }
   else
         {
            $user->updatePassword($password);  
         }
}

if(isset($_POST['btn-bio']))
    
{
   $biography = trim($_POST['bio']); 
    

   if(strlen($biography) > 300){
      $error[] = "Bio cannot be longer than 300 characters."; 
   }
   else if ($user->updateBio($biography))
         {
            header("Refresh:0");  
         }
}

if (isset($_POST['btn-img'])){
    if (($_FILES["image"]['name']) != "") {
        $temp = explode(".", $_FILES["image"]["name"]);
        $newFileName = $_SESSION['user_session'] .  '.' . end($temp);
       
        $target_dir = "../Model/profileimageuploads/";
        $target_file = $target_dir . $newFileName;
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        }
    
        else if ($uploadOk == 1){
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
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
<link rel="stylesheet" href="CSS/additionalCSS.css">
<link href="https://fonts.googleapis.com/css?family=Geostar+Fill|Raleway|Roboto|Stalinist+One" rel="stylesheet"
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
            <h2 class='tech-center'>My Settings</h2><hr />
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
            ?>
            <div class='col-sm-4 well well-lg'>
            <?php echo Controllers\display\display('my_image',['user' => $user, 'post' => $post]); ?>
            <?php echo Controllers\display\display('upload_image',['user' => $user, 'post' => $post]); ?>
            <div class='col-sm-12'>   
            <?php echo Controllers\display\display('update_biography',['user' => $user, 'post' => $post, 'thisUserBio' => $thisUserBio]); ?>
            </div>
            </div>
            <div class='col-sm-4 well well-lg'>
            <?php echo Controllers\display\display('update_form',['user' => $user, 'post' => $post, 'thisUserUsername' => $thisUserUsername, 'thisUserFirstName' => $thisUserFirstName, 'thisUserLastName' => $thisUserLastName , 'thisUserEmail' => $thisUserEmail]); ?>
            </div>
            
            <br />
        </form>
 </div>

</body>
</html>

