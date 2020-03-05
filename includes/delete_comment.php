<?php require_once('../admin/includes/init.php') ?>
<?php

if(isset($_POST['id'])) {

    $comment = Comment::findById($_POST['id']);
    $comment->delete();
}


?>