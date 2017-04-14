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
        
        <h3>Add Biography</h3>
            <div class="form-group">
                <label for="bioraphy">Name</label>
                <input class="form-control" type="text" name="biography" value="<?php if ( isset($_POST['biography']) ) echo $_POST['biography']; ?>">
            </div>

        <h3>Update email</h3>
        <div><h3>Add Biography</h3>
        <div class="container">
        
        <?php
        //gives a list of errors under 'Add Biography' heading, if user makes an error
        if ( isset($errors) && ! empty($errors)){
            echo '<ul><li>', implode('</li><li>', $errors), '</li></ul>';
        }
        ?>
       
            

           
            <div class="form-group">
                <label for="biography"> Biography </label>
                <textarea class="form-control" name="content" rows="3"><?php if ( isset($_POST['biography']) ) echo $_POST['biography']; ?></textarea>
            </div>
        
                <div>
                <input type="submit" value="Add Biography" name="btn-post">
                </div>
                       </form>
            </div>
 
        </div>

    </div>  
    
  
</body>
</html>
