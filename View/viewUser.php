<?php
//The page you see if you click on a username
include '../controllers/display.php';
include '../controllers/login.php';
include 'templates/userFunctions.php';
use function controllers\display\display;

require_once '../model/connection.php';

?>
<!DOCTYPE html>
<html lang="en">
  
<head><title>Get Into Techno</title></head>
<!--Including Bootstrap CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="CSS/additionalCSS.css">
<link href="https://fonts.googleapis.com/css?family=Geostar+Fill|Raleway|Roboto|Stalinist+One" rel="stylesheet">
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
    
    <div class="col-sm-12">
<!--This title calls the username created in the userFunctions file.-->    
<h2 class='tech-center'><?= $username ?>'s blog</h2>
    </div>

    <div class="col-sm-8">
<!--This part uses the display function to call in the content in the user blog template-->
        <?php echo Controllers\display\display('user_blog', ['post' => $post]); ?>
    </div>

    <div class="col-sm-4 well well-lg">
        <?php echo Controllers\display\display('user_other', ['user' => $user, 'post' => $post, 'sanitizedID' => $sanitizedID, 'usernameID' => $usernameID, 'userBioID' => $userBioID]); ?>
        <hr>
        <div class='col-sm-12'>
        <?php echo Controllers\display\display('archive', ['pdo' => $pdo]); ?>
        </div>
    </div>
    
    <div class='col-sm-12'>
        <?php echo Controllers\display\display('footer') ?>
    </div>
</html>