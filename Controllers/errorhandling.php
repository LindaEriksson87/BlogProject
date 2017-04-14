<?php

error_reporting(E_ALL);


//limit for word count
if ($wordcountofblog>500) {
    trigger_error("Your blog post is too long - trim and try again! Max. 500 words.");
}

//incorrect username or password
//if ()
  
$passwordcharacters= "$2y$10$2aNyIXKZJSgjvN3GEEc6TO0AnweslZsWH3ygnZp9V6SV1z5pIaPve, NULL";
if ($passwordchracters<=5) {
  trigger_error("Your password must include a minimum of 5 characters");
}

 
//uploading wrong file type, blog picture
    // if !jpeg etc.








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
		
	
        