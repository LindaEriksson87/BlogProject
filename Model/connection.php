<?php

$dsn = "mysql:host=localhost;dbname=blog_database"  ;
$username = "root";
$password = null;
$options = null;

try {
      $pdo = new PDO($dsn, $username, $password, $options);
      // set the PDO error mode to exception
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	trigger_error($e->getMessage());  
}

//set timezone
date_default_timezone_set('Europe/London');

include_once 'userClass.php';
$user = new USER($pdo);

include_once 'postClass.php';
$post = new POST($pdo);
//to set error hander

?>

