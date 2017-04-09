<?php

class POST 
{
    //The connection to the SQL database is set up for the class to use. 
    //The construction of the class is done in the connection file. 
    private $db;
 
    function __construct($pdo)
    {
      $this->db = $pdo;
    }
 
    public function newPost($title,$content)
    {
       try
       {$stmt = $this->db->prepare("INSERT INTO posts(post_title,post_content,date,user_id) 
                                                       VALUES(:title,:content,NOW(),:user_id)");
              
           $stmt->bindparam(":title", $title);
           $stmt->bindparam(":content", $content);
           $stmt->bindparam(":user_id", $_SESSION['user_session']);
           //$stmt->bindparam(":tags", $tags);         
           $stmt->execute();
           
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    public function readAll()
    {
        try
        {
            $stmt = $this->db->prepare("SELECT * FROM posts WHERE user_id=:user_id");
            $stmt->bindparam(":user_id", $_SESSION['user_session']);
            $stmt->execute();
            
            return $stmt;
        }
        catch(PDOException $e)
       {
            echo $e->getMessage();
       }    
    }
}
