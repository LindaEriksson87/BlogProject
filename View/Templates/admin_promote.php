<?php
require_once '../../model/connection.php';
include 'templates/userFunctions.php';

/*This page uses a function to destroy the user session. 
When the user clicks the link to log out, they are redirected here, 
but this page will never show up as they are immediately redirected back after the 
session is destroyed. */

//testing 
$user->promoteUser($sanitizedID);
header('Location: ../admin.php');
exit;