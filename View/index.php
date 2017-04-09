<?php

include '../controllers/display.php';
include '../controllers/login.php';
include 'templates/randomUser.php';
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
    
<div class="col-sm-8">
<h1>Welcome to our blog!</h1>

<!-- <p>Welcome paragraph goes here</p>

carousel of featured bloggers goes here -->


<div>
    <h2>Featured bloggers</h2>

    <p>Techno Bloggers:  <a href="viewUser.php?id=<?= $randomUserID ?>"><?= $randomUsername ?></a></p>
    <br><br>

    
    *carousel of featured bloggers random*
</div>
</div>
<div class="col-sm-4 well well-lg">
    <h2>Latest posts</h2>
    
  <!-- feed of latest posts -->
   
        	
   
    
    
</div>



</body>
</html>

