<?php require_once('includes/init.php'); ?>
<?php

if(!empty($_GET['id'])) {

    $news = News::findById($_GET['id']);

        if($news->deletePhoto()){

            redirect('tables.php');
        }
        
} else {
    redirect('tables.php');
}

?>
