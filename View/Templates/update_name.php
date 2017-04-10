?php 
   session_start();
    if (!session_is_registered(user))
  {
   header("location:login.php");
}
?>
<?php
include '../config/config.php';


 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $sessions = $_SESSION['user'];

  $sql = "UPDATE user_info SET name = '$firstname', lastname = '$lastname', WHERE username = '$sessions'";
  $result= mysql_query($sql);

  if($result){
  header("location:../settings_page.php");
  }

  else {
  echo error_reporting(E_ALL);
  } 



  
  
  mysql_close();
  ?>