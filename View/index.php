<?php

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
<!--This code randomly generates a user with the function from userFunctions,
then a link is added that will take the user to the viewuser page with a GET tag at the end, the 
GET will be id= + the ID linked to the username, this is also generated in userFunctions. After the name follows the bio for that user -->
<p><a href="viewUser.php?id=<?= $randomUserID ?>"><?= $randomUsername ?></a><br><?=$randomUserBio?></p>
    <br><br>

    
    *carousel of featured bloggers random*
</div>
</div>
<div class="col-sm-4 well well-lg">
    <h2>Latest posts</h2>
    
  <!-- feed of latest posts -->
  <ul>
<?php //****need View Postpage to link ******
$stmt = $pdo->query('SELECT post_title, post_id, user_id FROM posts ORDER BY post_id DESC LIMIT 5');
while($row = $stmt->fetch()){
    echo '<li><a href="viewPost.php?id='.$row['post_id'].'">'.$row['post_title'].'</a></li>';
}
?>
</ul> 
        	
</div>



</body>
</html>

