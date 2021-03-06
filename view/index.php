<?php
include '../controllers/display.php';
include '../controllers/login.php';
include 'templates/userFunctions.php';
use function controllers\display\display;
require_once '../model/connection.php';
?>

<!doctype html>
<html>
<head><title>Get Into Techno</title>


<!--Including Bootstrap CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="CSS/additionalCSS.css">
<link href="https://fonts.googleapis.com/css?family=Geostar+Fill|Raleway|Roboto|Stalinist+One" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    
<?php 
// Displaying the nav bar with a login form or logout button depending on if the user session is set or not.
if($user->is_loggedin()!="")
{
    echo controllers\display\display('nav_bar_signed_in'); 
}
else 
{
    echo controllers\display\display('nav_bar_signed_out'); 
}
?>
    
<div class="col-sm-8 introduction">
<h3 class="tech-center">Welcome to our blog!</h3>

<!-- <p>Welcome paragraph goes here</p>
carousel of featured bloggers goes here -->
<p>
    This blog is the greatest source of Techno music across the whole internet, five of the top techno experts sharing their unrivaled knowledge on the best music genre in the world.
</p><br>

<h4 class="tech-center">Song of the day</h4>    
<iframe width="100%" height="10%" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/35182750&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>

<br><br>

</div>
<div class="col-sm-4 well well-lg">
    <h3 class="tech-center">Latest posts</h3>
    
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
    
    <div class="col-sm-12  feat-blog" >
        <br><h4 class="tech-center-black">Featured blogger</h4>
<!--This code randomly generates a user with the function from userFunctions,
then a link is added that will take the user to the viewuser page with a GET tag at the end, the 
GET will be id= + the ID linked to the username, this is also generated in userFunctions. After the name follows the bio for that user -->
<div class="col-sm-2"></div><div class="col-sm-4"><br>
    <?php echo controllers\display\display('user_image_random',['user' => $user, 'post' => $post, 'randomUserID' => $randomUserID]); ?>
    <a href="viewUser.php?id=<?= $randomUserID ?>"><h4 class="tech-titles"><b><?= $randomUsername ?></b></h4></a>
    <?=$randomUserBio?></div>


    
</div>

    
    <div class="col-sm-12 feat-blog">  
<img class='img-responsive' src="../model/blogimages/concertbanner.png" alt="technorave" style="width:100%; height:45%;">
    </div>
  

    <div class='col-sm-12'>
    <?php echo controllers\display\display('footer') ?>
    </div>


</body>
</html>