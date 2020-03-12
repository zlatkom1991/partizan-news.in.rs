<?php require_once('includes/init.php'); ?>
<?php



if(!empty($_POST['submit'])) {

    $news = new News();

    $news->title = $_POST['title'];
    $news->body = $_POST['editordata'];
    $news->category_id = $_POST['category'];
    $news->setFile($_FILES['file']);

    if($news->save()) {
        $_SESSION['table_message'] = "Uspesno ste postavili vest!";
            redirect('news-table.php');
        } else {
            echo 'Nije postavljena vest!';
        }
    }








?>