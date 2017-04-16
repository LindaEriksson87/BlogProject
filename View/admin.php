<?php
include '../controllers/display.php';
include '../controllers/login.php';
include 'templates/userFunctions.php';
use function controllers\display\display;

require_once '../model/connection.php';



?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<!--Including Bootstrap CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="CSS/additionalCSS.css">
<link href="https://fonts.googleapis.com/css?family=Geostar+Fill|Stalinist+One" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


</head>
<body>
    
<?php 

if ($_SESSION['username'] != "Admin"){
    header('Location: ../View/index.php');
        exit;
}

    

// Displaying the nav bar with a login form or logout button depending on if the user session is set or not.
if($user->is_loggedin()!="")
{
    echo Controllers\display\display('nav_bar_signed_in'); 
}
else 
{
    echo Controllers\display\display('nav_bar_signed_out'); 
}
?>
    <div class='col-sm-12'>
    <div class='well well-lg col-sm-6'>
    <table class='table table-responsive table-striped' style="width:100%">
        <th>Username</th>
        <th>Level</th>
        <th>Promote</th>
        <th>Demote</th>
        <th>Delete</th>
        <?php
foreach ($userList as &$users){ ?><tr>
    <td width='30%'><a href="viewUser.php?id=<?=$users['user_id']?>"><b><?= $users['user_name']?></b></a></td> 
<td width='20%'><?php if($users['admin'] == 2){echo '<strong>Moderator</strong>';}?></td>
<td width="10%"><input type="button" class="btn btn-success" value="Promote" name="btn-promote" onclick="window.location.href='templates/admin_promote.php?id='+<?=$users['user_id'] ?>;" />  </td>
<td width="10%"><input type="button" class="btn btn-warning" value="Demote" name="btn-demote" onclick="window.location.href='templates/admin_demote.php?id='+<?=$users['user_id'] ?>;" />  </td>
<td width="10%"><input type="button" class="btn btn-danger" value="Delete" name="btn-delete" onclick="window.location.href='templates/admin_delete.php?id='+<?=$users['user_id'] ?>;" />  </td>
</tr>    
<?php } ?>
    </table>
    </div>
    </div>
</body>
</html>

