<?php
//The page you see if you click on a username
include '../controllers/display.php';
include '../controllers/login.php';
include 'templates/userFunctions.php';
use function controllers\display\display;

require_once '../model/connection.php';

$thisID = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_ENCODED);

?>
<!doctype html>
<html>
<head><title>Get Into Techno</title></head>
<!--Including Bootstrap CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="CSS/additionalCSS.css">
<link href="https://fonts.googleapis.com/css?family=Geostar+Fill|Raleway|Roboto|Stalinist+One" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

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
    
    <div class="col-sm-2"></div>
        <div class="col-sm-8" >
<!--This part uses the display function to call in the content in the user blog template-->
            <?php echo Controllers\display\display('user_post', ['post' => $post, 'user' => $user]); ?>
                <br>
            <?php if ($userID == $_SESSION['user_session'] || $adminLevel > 1){ ?>
                
               <?php echo Controllers\display\display('delete_update_buttons', ['post' => $post, 'user' => $user, 'thisID' => $thisID]);
                
            } ?>
        </div>
    
    <div class="col-sm-2"></div>
    