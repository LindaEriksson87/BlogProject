<?php 
   session_start();
    if (!session_is_registered(user))
  {
   header("location:login.php");
}
?>

<?php
include '../config/config.php';


 $firstname = $_POST['first_name'];
 $lastname = $_POST['last_name'];
 $sessions = $_SESSION['user'];

  $sql = "UPDATE user_info SET first_name = '$firstname', last_name = '$lastname', WHERE username = '$sessions'";
  $result= mysql_query($sql);

  if($result){
  header("location:../settings_page.php");
  }

  else {
  echo error_reporting(E_ALL);
  } 



  
  
  mysql_close();
  ?>