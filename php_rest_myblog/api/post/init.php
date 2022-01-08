<?php
    // Requirements
    require_once('../../config/Database.php');
    require_once('../../models/Post.php');

    // Instatiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instatiate blog post object
    $post = new Post($db);
?>