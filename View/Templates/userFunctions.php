<?php

/*Defining variables with help from the random user method found in the user class. 
Random Username will call the username so that it can be echoed on the page. 
Random User ID can be used in links for that user, so that their content can be accessed.*/

$userArray = $user->randomUser();
$randomUsername = $userArray[0];
$randomUserID = $userArray[1];


/*Defining variables for viewing the info of a specific user through a get request. 
When clicking on a username you'll be redirected to the page with the id of that user. 
The following variables will change depending on that ID. */

$sanitizedID = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_ENCODED);
$viewUser = $user->viewUser($sanitizedID);
$username = $viewUser[0];
$userFirstName = $viewUser[1];
$userLastName = $viewUser[2];