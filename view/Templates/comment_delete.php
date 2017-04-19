<?php

require_once '../../model/connection.php';
include 'userFunctions.php';
include 'comment_delete_button';

$thisPost = filter_input(INPUT_GET, 'post',FILTER_SANITIZE_ENCODED);
$thisComment = filter_input(INPUT_GET, 'id',FILTER_SANITIZE_ENCODED);

        $comment->deleteComment($thisComment);
        header('Location: ../viewPost.php?id='.$thisPost);
        exit;

