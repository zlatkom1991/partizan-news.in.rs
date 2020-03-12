<?php require_once('includes/init.php'); ?>
<?php

if(!empty($_GET['id'])) {

    $news = News::findById($_GET['id']);

        if($news->deletePhoto()){

            $_SESSION['table_message'] = "Uspesno ste obrisali vest!";
            redirect('news-table.php');

        }
        
} else {
    redirect('news-table.php');
}

?>
