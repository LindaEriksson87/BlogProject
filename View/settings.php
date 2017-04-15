<?php
include '../controllers/display.php';
include '../controllers/login.php';


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
        <!--RW - for posting a profile picture -->
          <div id="post" class="collapse">
            <form class ="col-sm-8 well well-lg" action="" method="post">
                <div class="form-group">
                <label for="image">Image</label>
                <input type="image" name="title" value="<?php if ( isset($_POST['image']) ) echo $_POST['image']; ?>">                
                </div>
          </div>
        
        <h3>Update name</h3>
               <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" value="<?php if ( isset($_POST['name']) ) echo $_POST['name']; ?>">
               </div>
        
        <h3>Update Email</h3>
               <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" name="email" value="<?php if ( isset($_POST['email']) ) echo $_POST['email']; ?>">
               </div>
       

        <?php echo Controllers\display\display('add_biography', ['user' => $user, 'post'=>$post]); ?>

    </div>  
    
  
</body>
</html>
