<?php
require_once '../../model/connection.php';

session_start();

$user->logout();
header('Location: ../index.php');
exit;