<?php

$userArray = $user->randomUser();
$randomUsername = $userArray[0];
$randomUserID = $userArray[1];

$userID = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_ENCODED);
$viewUser = $user->viewUser($userID);
$username = $viewUser[0];
$userFirstName = $viewUser[1];
$userLastName = $viewUser[2];