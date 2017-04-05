<?php

if(isset($_POST['contents'], $_POST['category'])){
    //getting rid of whitespace
    $title      = trim($_POST['title']);
    $contents   = trim($_POST['contents']);
    //something new
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
                <input type="text" name="title">
            </div>
            
            <div>
                <label for="contents"> Contents </label>
                <textarea name="contents" rows="15" cols="50"></textarea>
            </div>
            
            <div>
                <label for="category"> Category </label>
                <select name="category"></select>
            </div>
            
            <div>
                <input type="submit" value="Add Post">
            </div>
           
        </form>
    </body>
</html>
