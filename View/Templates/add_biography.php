<?php

require_once '../model/connection.php';

//The below should be redundant as long as the button is pushed. 
//$_POST['biography']

if (isset ($_POST['btn-post'])){
//getting rid of whitespace
    $biography   = trim($_POST['biography']);
   // $tags      = trim($_POST['tags']);

    
    if (empty($biography)) {

        $error[] = "Please enter some text.";
    } 
    
    
    if (strlen($biography) > 500) {
    $errors = 'Please shorten your blog post, it is too long (500 character limit).';
    }

    else {
        $post->newPost($biography);
    }
}




?>
