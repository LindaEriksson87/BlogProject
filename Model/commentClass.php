
.<?php

class COMMENT 
{
    //The connection to the SQL database is set up for the class to use. 
    //The construction of the class is done in the connection file. 
    private $db;
 
    function __construct($pdo)
    {
      $this->db = $pdo;
    }
 
    
    /*This is the method to create a new blog post. The post will be added with 
     * a title, content, the current time and date and the logged in user ID. 
     * Tags are currently commented out as they are not yet working. 
     */
    public function newComment($commentContent, $post_id)
    {
       try
       {$stmt = $this->db->prepare("INSERT INTO comments(comment_content,date,user_id,post_id) 
                                                       VALUES(:comment_content,NOW(),:user_id,:post_id)");
              
           $stmt->bindParam(":comment_content", $commentContent);
           $stmt->bindParam(":user_id", $_SESSION['user_session']);
           $stmt->bindParam(":post_id", $post_id); 
           $stmt->execute();
           
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    
    
    //This is a method to read all the posts in the database written by the logged in user. 
    public function readAll($post_id)
    {
        try
        {
            $stmt = $this->db->prepare("SELECT comment_id, comment_content, date, user_id FROM comments WHERE post_id=:post_id ORDER BY date DESC");
            $stmt->bindparam(":post_id", $post_id);
            $stmt->execute();
            
            return $stmt->fetchall();
        }
        catch(PDOException $e)
       {
            echo $e->getMessage();
       }    
    }
   
    
    public function deleteComment($comment_id) {
        try
        {
        $stmt=$this->db->prepare("DELETE FROM comments WHERE comment_id=:comment_id");
        $stmt->bindParam(":comment_id", $comment_id);
        $stmt->execute(); 
 
	return $stmt->fetch();
    }
    catch(PDOException $e)
       {
            echo $e->getMessage();
       }    
    }
}