<?php 
include '../controllers/display.php';
include '../controllers/login.php';
include 'templates/userFunctions.php';
use function controllers\display\display;

require_once '../model/connection.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="CSS/additionalCSS.css">
<link href="https://fonts.googleapis.com/css?family=Geostar+Fill|Raleway|Roboto|Stalinist+One" rel="stylesheet"
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
        $searchtermUser = '';
        $searchtermTag = '';
        
        if($isSubmitted){
            
            
            

            $error = false;

            //RW - have commented below out because currently it's quite useful to make an empty search as it shows all users
            /*if(empty($searchterm))
            {
                $searchterm_error='searchbar section is empty. Please enter your search term.';//comment validation
                $error=true;
            } */
	}
        
        ?>
    <div class='container'>
    <div class="row well well-lg col-sm-10 justify-content-center">
        <div class="form-group">
            <label for ='searchUser'>Search for a user:</label><br>
            <form class='' action='' method='POST'><br>
                <input class='form-control' type='text' value ='<?=$searchtermUser ?>' name='searchUser'><br><br>
                <input class='btn btn-info' type='submit' value='Search for User' name='btn-user'><br>
            </form>
        </div>

        
        <label>Results</label>
        
            <?php 
            if(isset ($_POST['btn-user']))
            {            
                $searchtermUser = trim($_POST['searchUser']);
                $cleanedSearchtermUser = $searchtermUser; //mysqli_real_escape_string($pdo, $searchterm);//removes any unwanted code submitted by the user before saving to database
                $sql = "SELECT user_id, user_name, first_name, last_name 
                FROM blog_database.users
                where user_name <> 'Admin' and user_name like '%$cleanedSearchtermUser%' or user_name <> 'Admin' and first_name like '%$cleanedSearchtermUser%' or user_name <> 'Admin' and last_name like '%$cleanedSearchtermUser%';"; 

                $stmt = $pdo->query($sql);
                echo '<ul>';
                
                while($row = $stmt->fetch()){
                    $text = $row['user_name'].' - '.$row['first_name'].' '.$row['last_name'] ;
                    $id = $row['user_id'];
                    $href='viewUser.php?id='.$id;
                    echo '<li><a href="'.$href.'">'.$text.'</a></li>';
                }
                
                echo '</ul>';
            }
            
            //RW - no results found error message
            if (empty($href) && !empty($isSubmitted)) { 
                echo 'No results found'; 
            }
     
            ?>
    
        <hr>
    <div class="form-group">
            <label for ='searchTag'>Search for a tag:</label><br>
            <form class='' action='' method='POST'><br>
                <input class='form-control' type='text' value ='<?=$searchtermTag?>' name='searchTag'><br><br>
                <input class='btn btn-info' type='submit' value='Search for Tag' name='btn-tag'><br>
            </form>
        </div>

        
        <label>Results</label>
        
            <?php 
            if(isset ($_POST['btn-tag']))
            {            
                $searchtermTag = trim($_POST['searchTag']);
                $cleanedSearchtermTag = $searchtermTag; //mysqli_real_escape_string($pdo, $searchterm);//removes any unwanted code submitted by the user before saving to database
                $sql = "SELECT post_title, post_id, user_name, tags
                FROM blog_database.posts
                INNER JOIN blog_database.users ON posts.user_id = users.user_id
                WHERE tags LIKE '%$cleanedSearchtermTag%';"; 

                $stmt = $pdo->query($sql);
                echo '<ul>';
                
                while($row = $stmt->fetch()){
                    $text = $row['user_name'].' - '.$row['post_title'].' - '.$row['tags'];
                    $id = $row['post_id'];
                    $href='viewPost.php?id='.$id;
                    echo '<li><a href="'.$href.'">'.$text.'</a></li>';
                }
                
                echo '</ul>';
            }
            
            
            else if (isset ($_GET['tag'])){
                
                $searchtermTag = trim($_GET['tag']);
                $cleanedSearchtermTag = $searchtermTag; //mysqli_real_escape_string($pdo, $searchterm);//removes any unwanted code submitted by the user before saving to database
                $sql = "SELECT post_title, post_id, user_name, tags
                FROM blog_database.posts
                INNER JOIN blog_database.users ON posts.user_id = users.user_id
                WHERE tags LIKE '%$cleanedSearchtermTag%';"; 

                $stmt = $pdo->query($sql);
                echo '<ul>';
                
                while($row = $stmt->fetch()){
                    $text = $row['user_name'].' - '.$row['post_title'].' - '.$row['tags'];
                    $id = $row['post_id'];
                    $href='viewPost.php?id='.$id;
                    echo '<li><a href="'.$href.'">'.$text.'</a></li>';
                }
                
                echo '</ul>';
                
            }
            //RW - no results found error message
            if (empty($href) && !empty($isSubmitted)) { 
                echo 'No results found'; 
            }
     
            ?>
    </div>
    </div>    
        <script>
        <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myblog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="Linda" id="Lindablog"></h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</script>
</body>
</html>
