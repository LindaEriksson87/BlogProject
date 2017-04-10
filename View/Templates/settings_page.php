<?php
include '../controllers/display.php';
include '../controllers/login.php';
use function controllers\display\display;

require_once '../model/connection.php';

?>
<!doctype html>
<html>
<head><title>Get into Techno</title></head>
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
<body>
    <header>Settings</header>
    
    <div>
        <h3>Upload image</h3>
        
        <h3>Update name</h3>
        <h3>Update email</h3>
        <h3>Add Biography</h3>
    </div>  
    
  
</body>
</html>
