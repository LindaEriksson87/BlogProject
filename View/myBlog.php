<?php
//The page you see when you're logged in
include '../controllers/display.php';
include '../controllers/login.php';
include 'templates/userFunctions.php';

use function controllers\display\display;

require_once '../model/connection.php';


?>
<!doctype html>
<html>
<head><title>Get Into Techno</title></head>
<!--Including Bootstrap CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="CSS/blogCSS.css">
<link href="https://fonts.googleapis.com/css?family=Geostar+Fill|Stalinist+One" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
<!--This title calls the username for the currently logged in user set in SESSION.--> 
        <h2><?= $_SESSION['username'] ?>'s blog</h2>
    </div>
        
    <div class="col-sm-8">
<!--This part uses the display function to call in the content in the form needed to post new content-->
        <?php echo Controllers\display\display('upload', ['post' => $post]); ?>

<!--This part uses the display function to call in the content in the user my_blog template-->
        <?php echo Controllers\display\display('my_blog', ['post' => $post]); ?>
    </div>
       
    <div class="col-sm-4 well well-lg">
        <?php echo Controllers\display\display('user_loggedIn', ['thisUserBio' => $thisUserBio]); ?>
        <?php echo Controllers\display\display('archive', ['pdo' => $pdo]); ?>
    </div>