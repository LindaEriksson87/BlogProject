<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $user='john';// replace with actual logged in user
        
        $comment = trim($_POST['comment']);
	
	$error = false;
	
	if(empty($comment))
	{
		$comment_error='comment section is empty. Please enter your comment.';//comment validation
		$error=true;
	}
        if(false === $error)
	{
	$dsn = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   trigger_error("Connection failed: " . $conn->connect_error);
} 
//change 28-31 to reflect database info
$cleanedComment = mysqli_real_escape_string($conn, $comment);//removes any unwanted code submitted by the user before saving to database
$sql = "INSERT INTO Comment (user, comment)
VALUES ('$user','$cleanedComment')"; //include username and comments 



if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();	
		
	}
        ?>
        <p>Submitted Comments</p>
       
    </body>
</html>



