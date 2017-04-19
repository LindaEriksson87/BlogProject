<?php

error_reporting(E_ALL);


//limit for word count - the commented out code below is now in the upload.phtml file.
// if ($wordcountofblog>2000) {
//    trigger_error("Your blog post is too long - trim and try again! Max. 2000 characters.");
// }

//incorrect username or password
    //INSERT CODE HERE


//password too short 
  
$passwordcharacters= "$2y$10$2aNyIXKZJSgjvN3GEEc6TO0AnweslZsWH3ygnZp9V6SV1z5pIaPve, NULL";
if ($passwordchracters<=5) {
  trigger_error("Your password must include a minimum of 5 characters");
}


//invalid email address

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    trigger_error("This is not a valid email address, please try again.");
}

  
//uploading wrong file type, blog picture
    // RW this is in the add_post.php file


//Image size is too large - this is now in upload.phtml



// inapproatate text in submitted in the comment section 
 $user='linda';// replace with actual logged in user
        
        $comment = trim($_POST['comment']);
	
	$error = false;
	
	if(empty($comment))
	{
		$comment_error='comment section is empty. Please enter your comment.';//comment validation
		$error=true;
	}
        if(false === $error)
	{
      $cleanedComment = mysqli_real_escape_string($pdo, $comment);//removes any unwanted code submitted by the user before saving to database
$sql = "INSERT INTO Comment (user, comment)
VALUES ('$user','$cleanedComment')"; //include username and comments 
      
        }
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();	
		
	
        