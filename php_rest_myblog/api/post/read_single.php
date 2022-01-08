<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  // init Database and Post obj
  require_once('init.php');

  //Get ID from URL
  $post->id = isset($_GET['id']) ? $_GET['id'] : die();

  //Get Post
  $post->read_single();

  $post_arr = array(
    'id' => $post->id,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'category_id' => $post->category_id,
    'category_name' => $post->category_name
  );

  // Print JSON
  print_r(json_encode($post_arr));