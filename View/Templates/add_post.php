<?php

if(isset($_POST['contents'], $_POST['category'])){
    //getting rid of whitespace
    $title      = trim($_POST['title']);
    $contents   = trim($_POST['contents']);
   
    if (empty ($title)){
        
    }
    
    if (empty($contents)){
        
        
    }
               
}

?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8">
        
        <title> Add Post </title>
    </head>

    <body>
        <h1> Add Post </h1>
        
        <form method="post">
            
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" value="<?php if ( isset($_POST['title']) ) echo $_POST['title']; ?>">
            </div>
            
            <div>
                <label for="image">Image</label>
                <input type="image" name="title" value="<?php if ( isset($_POST['image']) ) echo $_POST['image']; ?>">                
            </div>
            
            <div>
                <label for="contents"> Contents </label>
                <textarea name="contents" rows="15" cols="50"><?php if ( isset($_POST['contents']) ) echo $_POST['contents']; ?></textarea>
            </div>
            
            <div>
                <label for="musicplayer"> Music Player </label>
                <select name="musicplayer"></select>
            </div>
            
            <div>
                <label for="tags"> Tags </label>
                <select name="tags"></select>
                <?php
                foreach ( get_tags() as $tags ) {
                    ?>
                <option value ="<?php echo $tags['id']; ?>"><?php echo $tags['name']; ?></option>
                <?php
                }
                ?>
                
            </div>
            
            <div>
                <input type="submit" value="Add Post">
            </div>
           
        </form>
    </body>
</html>
