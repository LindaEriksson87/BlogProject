<?php
//The page you see when you're logged in
include '../controllers/display.php';
include '../controllers/login.php';
use function controllers\display\display;

require_once '../model/connection.php';

?>
<!doctype html>
<html>
<head><title>Get Into Techno</title></head>
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
    
<!--This title calls the username for the currently logged in user set in SESSION.--> 
<h2><?= $_SESSION['username'] ?>'s blog</h2>

<!--This part uses the display function to call in the content in the form needed to post new content-->
<?php echo Controllers\display\display('add_post', ['post' => $post]); ?>

<!--This part uses the display function to call in the content in the user my_blog template-->
<?php echo Controllers\display\display('my_blog', ['post' => $post]); ?>
