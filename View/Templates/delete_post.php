<?php

require_once '../../model/connection.php';
include 'userFunctions.php';

        $post->deletePost($postID);
        header('Location: ../myBlog.php');
        exit;

