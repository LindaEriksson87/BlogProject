<?php
class USER
{
    private $db;
 
    function __construct($pdo)
    {
      $this->db = $pdo;
    }
 
    public function register($first_name,$last_name,$user_name,$email,$password)
    {
       try
       {
           $new_password = password_hash($password, PASSWORD_DEFAULT);
   
           $stmt = $this->db->prepare("INSERT INTO users(user_name,first_name,last_name,email,password) 
                                                       VALUES(:user_name,:first_name,:last_name,:email,:password)");
              
           $stmt->bindparam(":first_name", $first_name);
           $stmt->bindparam(":last_name", $last_name);
           $stmt->bindparam(":user_name", $user_name);
           $stmt->bindparam(":email", $email);
           $stmt->bindparam(":password", $new_password);            
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
 
    public function login($user_name,$email,$password)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM users WHERE user_name=:user_name OR email=:email LIMIT 1");
          $stmt->execute(array(':user_name'=>$user_name, ':email'=>$email));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($password, $userRow['password']))
             {
                $_SESSION['user_session'] = $userRow['user_id'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>