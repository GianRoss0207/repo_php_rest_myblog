<?php
    // Requirements
    require_once('../../config/Database.php');
    require_once('../../models/Category.php');

    // Instatiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instatiate blog post object
    $category = new Category($db);