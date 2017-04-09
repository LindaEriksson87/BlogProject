<?php
require_once '../../model/connection.php';

session_start();
//testing 
$user->logout();
header('Location: ../index.php');
exit;