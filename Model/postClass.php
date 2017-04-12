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
 
    
    /*This is the method to create a new blog post. The post will be added with 
     * a title, content, the current time and date and the logged in user ID. 
     * Tags are currently commented out as they are not yet working. 
     */
    public function newPost($title,$content)
    {
       try
       {$stmt = $this->db->prepare("INSERT INTO posts(post_title,post_content,date,user_id) 
                                                       VALUES(:title,:content,NOW(),:user_id)");
              
           $stmt->bindparam(":title", $title);
           $stmt->bindparam(":content", $content);
           $stmt->bindparam(":user_id", $_SESSION['user_session']);
           //$stmt->bindparam(":tags", $tags);   //TODO: Use tag ID from the tags table      
           $stmt->execute();
           
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    
    //This is a method to read all the posts in the database written by the logged in user. 
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
    
    //This is a method to read all posts in the database written by a user searched for by ID. 
    public function readUser($user_id)
    {
        try
        {
            $stmt = $this->db->prepare("SELECT * FROM posts WHERE user_id=:user_id");
            $stmt->bindparam(":user_id", $user_id);
            $stmt->execute();
            
            return $stmt;
        }
        catch(PDOException $e)
       {
            echo $e->getMessage();
       }    
    }
    
    //This is a method to read all posts in the database written by a user searched for by tag. 
    public function readTag($tag_id)
    {
        try
        {
            $stmt = $this->db->prepare("SELECT post_id, post_title, post_content, date, posts.tags, user_id , tags.tag_name
                                        FROM posts INNER JOIN tags ON tags.tag_id =  posts.tags;  WHERE tags.tag_id = ':tag_id'");
            $stmt->bindparam(":tag_id", $tag_id);
            $stmt->execute();
            
            return $stmt;
        }
        catch(PDOException $e)
       {
            echo $e->getMessage();
       }    
    }
}
