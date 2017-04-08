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
       {$stmt = $this->db->prepare("INSERT INTO posts(post_title,post_content,date) 
                                                       VALUES(:title,:content,NOW())");
              
           $stmt->bindparam(":title", $title);
           $stmt->bindparam(":content", $content);
           //$stmt->bindparam(":tags", $tags);         
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
}
?>