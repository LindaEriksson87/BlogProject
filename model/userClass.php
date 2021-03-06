<?php
class USER
{
    //The connection to the SQL database is set up for the class to use. 
    //The construction of the class is done in the connection file. 
    private $db;
 
    function __construct($pdo)
    {
      $this->db = $pdo;
    }
 
    //A function for registering a new user, the arguments are passed from register.php
    public function register($first_name,$last_name,$user_name,$email,$password)
    {
       try
       {   //The build in password_hash functions turns the given password into a scribbled code.
           //This password needs to be unscribbled again with the password_verify function later used for logging in.
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
    
    public function update($first_name,$last_name,$user_name,$email)
    {
       try
       {      
           $stmt = $this->db->prepare("UPDATE users 
                                        SET user_name=:user_name,first_name=:first_name,last_name=:last_name,email=:email 
                                        WHERE user_id=:user_id");
              
           $stmt->bindParam(":first_name", $first_name);
           $stmt->bindParam(":last_name", $last_name);
           $stmt->bindParam(":user_name", $user_name);
           $stmt->bindParam(":email", $email);
           $stmt->bindParam(":user_id", $_SESSION['user_session']);
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    
    public function updatePassword($password)
    {
       try
       {   //The build in password_hash functions turns the given password into a scribbled code.
           //This password needs to be unscribbled again with the password_verify function later used for logging in.
           $new_password = password_hash($password, PASSWORD_DEFAULT);
   
           $stmt = $this->db->prepare("UPDATE users 
                                        SET password=:password  
                                        WHERE user_id=:user_id");
              
           $stmt->bindParam(":password", $new_password); 
           $stmt->bindParam(":user_id", $_SESSION['user_session']);
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    //This function tests the arguments provided in login.php, the user can log in with either the username or email.
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
                 //When the user is successfully logged in a session ID is set for this user.
                 //This session ID can be used in other functions to call user specific content.
                $_SESSION['user_session'] = $userRow['user_id'];
                $_SESSION['username'] = $userRow['user_name'];
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
 
   //This is a function to simply check if a user is logged in or not. 
   public function is_loggedin()
   {
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
   
   //This function will redirect a user to the url passed in 
   //as an argument from wherever the function is called, e.g. login.php
   
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   //This function destroys the user session and therefore logs out the user.
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
   
   //This function randomly generates a user from the user table, and returns the name and ID as an array.
   public function randomUser() {
       try
        {
        $stmt=$this->db->prepare("SELECT user_name, user_id FROM users WHERE user_name <> 'Admin' ORDER BY RAND() LIMIT 1");
       
        $stmt->execute(); 
	return $stmt->fetch();
         }
    catch(PDOException $e)
       {
            echo $e->getMessage();
       }    
}

   public function allUsers() {
       try
        {
        $stmt=$this->db->prepare("SELECT user_name, user_id , admin FROM users WHERE user_name <> 'Admin'");
       
        $stmt->execute(); 
	return $stmt->fetchAll();
         }
    catch(PDOException $e)
       {
            echo $e->getMessage();
       }    
}

//This function generates the information of a user searched for by ID. It returns the username, first name and last name as an array. 
    public function viewUser($user_id) {
        try
        {
        $stmt=$this->db->prepare("SELECT user_name,first_name,last_name FROM users WHERE user_id=:user_id");
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute(); 
 
	return $stmt->fetch();
    }
    catch(PDOException $e)
       {
            echo $e->getMessage();
       }    
    }
    
        public function getUsername($user_id) {
        try
        {
        $stmt=$this->db->prepare("SELECT user_name FROM users WHERE user_id=:user_id");
        $stmt->bindparam(":user_id", $user_id);
        $stmt->execute(); 
 
	return $stmt->fetch();
    }
    catch(PDOException $e)
       {
            echo $e->getMessage();
       }    
    }
    
    public function getAdminLevel($userID) {
        try
        {
        $stmt=$this->db->prepare("SELECT admin FROM users WHERE user_id=:user_id");
        $stmt->bindParam(":user_id", $userID);
        $stmt->execute(); 
 
	return $stmt->fetch();
    }
    catch(PDOException $e)
       {
            echo $e->getMessage();
       }    
    }
    
     public function postBio($bio)
    {
       try
       {$stmt = $this->db->prepare("INSERT INTO users(bio) 
                                    VALUES(:bio) WHERE user_id=:user_id");
           $stmt->bindparam(":bio", $bio);   
           $stmt->bindparam(":user_id", $_SESSION['user_session']);
           $stmt->execute();
           
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    public function updateBio($bio)
    {
       try
       {$stmt = $this->db->prepare("UPDATE users
                                    SET bio=:bio
                                    WHERE user_id=:user_id");
       
           $stmt->bindparam(":bio", $bio);   
           $stmt->bindparam(":user_id", $_SESSION['user_session']);
           $stmt->execute();
           
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    public function thisUser()
    {
       try
       {$stmt = $this->db->prepare("SELECT * FROM users WHERE user_id=:user_id");
              
           $stmt->bindparam(":user_id", $_SESSION['user_session']);    
           $stmt->execute();
           
           return $stmt->fetch(); 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
        public function UserIDBio($user_id)
    {
       try
       {$stmt = $this->db->prepare("SELECT bio FROM users WHERE user_id=:user_id");
              
           $stmt->bindparam(":user_id", $user_id);    
           $stmt->execute();
           
           return $stmt->fetch(); 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
        public function promoteUser($userID)
    {
       try
       {$stmt = $this->db->prepare("UPDATE users
                                    SET admin='2'
                                    WHERE user_id=:user_id");
         
           $stmt->bindParam(":user_id", $userID);
           $stmt->execute();
           
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    public function demoteUser($userID)
    {
       try
       {$stmt = $this->db->prepare("UPDATE users
                                    SET admin=NULL
                                    WHERE user_id=:user_id");
         
           $stmt->bindparam(":user_id", $userID);
           $stmt->execute();
           
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
    public function deleteUser($userID)
    {
       try
       {$stmt = $this->db->prepare("DELETE FROM users 
                                    WHERE user_id=:user_id");
         
           $stmt->bindparam(":user_id", $userID);
           $stmt->execute();
           
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }    
    }
    
}