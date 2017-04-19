<?php require_once '../../model/connection.php';?>
<?php include '../../model/postClass.php;'?>

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
                echo '<input type="text" value="'.$tagname.'" name="Key Tags"/>';
        ?>
            
            <input  type="tag" value="OK" /> 
        </form>
        
        <p>Results</p>
        
            <?php 
            if(true === $isSubmitted)
            {            
                $tagname = $sanitizedTag; //mysqli_real_escape_string($pdo, $sterm);//removes any unwanted code submitted by the user before saving to database
                $sql = "SELECT user_id, user_name, first_name, last_name 
                FROM blog_database.users
                where user_name like '%$sanitizedTag%' or first_name like '%$sanitizedTag%' or last_name like '%$sanitizedTag%';"; 

                $stmt = $pdo->query($sql);
                echo '<ul>';
                
                while($row = $stmt->fetchall()){
                    $posts = $post['1'].' - '.$post['2'].' '.$post['3'] ;
                    $id = $row['tags_id'];
                    $href='tags.php?id='.$id;
                    echo '<li><a href="'.$href.'">'.$text.'</a></li>';
                }
                
                echo '</ul>';
            }
     
            ?>

?>
               
</body>
</html> 