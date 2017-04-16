<?php
include '../controllers/display.php';
include '../controllers/login.php';
require_once '../model/connection.php';
//The settings page needs to have all fields working, and it needs to be designed and have bootstrap added. 
?>
<!doctype html>
<html>
<head><title>Get into Techno</title></head>
<!--Including Bootstrap CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="CSS/additionalCSS.css">
<link href="https://fonts.googleapis.com/css?family=Geostar+Fill|Stalinist+One" rel="stylesheet">
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
<body>
    <header>Settings</header>
    
    
       <?php echo Controllers\display\display('upload_image', ['user' => $user, 'post'=>$post]); ?>

       <?php echo Controllers\display\display('update_email', ['user' => $user, 'post'=>$post]); ?> 
        
        <?php echo Controllers\display\display('update_name', ['user' => $user, 'post'=>$post]); ?>
        
        <?php echo Controllers\display\display('add_biography', ['user' => $user, 'post'=>$post]); ?>

    </div>  
    
  
</body>
</html>
