<?php require_once '../model/connection.php'; ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="CSS/blogCSS.css">
<link href="https://fonts.googleapis.com/css?family=Geostar+Fill|Stalinist+One" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </head>   
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

        
        $isSubmitted = $_SERVER['REQUEST_METHOD'] == 'POST';
        $searchterm = '';
        
        if($isSubmitted){
            
            $searchterm = trim($_POST['searchbox']);

            $error = false;

            if(empty($searchterm))
            {
                $searchterm_error='searchbar section is empty. Please enter your search term.';//comment validation
                $error=true;
            }
	}
        
        ?>
        
        <p>Search</p>
        <form action="search.php" method="POST" > 
            
        <?php 
                echo '<input type="text" value="'.$searchterm.'" name="searchbox"/>';
        ?>
            
            <input  type="submit" value="OK" /> 
        </form>
        
        <p>Results</p>
        
            <?php 
            if(true === $isSubmitted)
            {            
                $cleanedsearchterm = $searchterm; //mysqli_real_escape_string($pdo, $searchterm);//removes any unwanted code submitted by the user before saving to database
                $sql = "SELECT user_id, user_name, first_name, last_name 
                FROM blog_database.users
                where user_name like '%$cleanedsearchterm%' or first_name like '%$cleanedsearchterm%' or last_name like '%$cleanedsearchterm%';"; 

                $stmt = $pdo->query($sql);
                echo '<ul>';
                
                while($row = $stmt->fetch()){
                    $text = $row['user_name'].' - '.$row['first_name'].' '.$row['last_name'] ;
                    $id = $row['user_id'];
                    $href='user.php?id='.$id;
                    echo '<li><a href="'.$href.'">'.$text.'</a></li>';
                }
                
                echo '</ul>';
            }
     
            ?>
    </body>
</html>


