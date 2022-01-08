<?php
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require_once('../../config/Database.php');
  require_once('../../models/Post.php');

  // Instatiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instatiate blog post object
  $post = new Post($db);

  // Blog post query
  $result = $post->read();

  // Get row count
  $num = $result->rowCount();

  if($num > 0){
    $post_arr = array();
    $post_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
      extract($row);

      $post_item = array(
        'id' => $id,
        'title' => $title,
        'body' => html_entity_decode($body),
        'author' => $author,
        'category_id' => $category_id,
        'category_name' => $category_name
      );

      // Push Post item
      array_push($post_arr['data'], $post_item);
    }

    // Turn to JSON
    echo json_encode($post_arr);

  } else{
    // No Posts
    echo json_encode(
      array( 'message' => 'No Posts Found' )
    );
  }

 ?>
