<?php require_once '../../model/connection.php';?>
<?php 'include ../../Model/postClass.php;'?>

<!DOCTYPE html>

<?php  
        
        $isSubmitted = $_SERVER['REQUEST_METHOD'] == 'POST';
        $tagssearch = '';
        
        if($isSubmitted){
            
            $tagssearch = trim($_POST['tag box']);

            $error = false;

            if(empty($tagssearch))
            {
                $tagssearch_error='Tag bar section is empty. Please enter your search term.';//comment validation
                $error=true;
            }
	}
        
        ?>
        
        <p>Tags</p>
        <form action="tags.php" method="POST" > 
            
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

?>
               
</body>
</html> 