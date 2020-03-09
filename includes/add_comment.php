<?php require_once('../admin/includes/init.php'); ?>
<?php

  if(isset($_POST['author']) && isset($_POST['comment']) && isset($_GET['id'])) {

    $comment = new Comment();
    $comment->author = htmlspecialchars($_POST['author']);
    $comment->comment = htmlspecialchars($_POST['comment']);
    $comment->news_id = $_GET['id'];
    
    if($comment->save()) {

        return true;
    }


  } else {
      die();
  }



?>