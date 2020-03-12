<?php require_once('includes/init.php') ?>
<?php

$categories = Category::findAll();

if(!empty($_GET['id'])) {

  $news = News::findById($_GET['id']);
 
}

// if(isset($_FILES['file'])) {

//   $news->deletePhoto();

// }

  if(!empty($_POST['update'])) {

    $news->id = $_GET['id'];
    $news->title = $_POST['title'];
    $news->body = $_POST['body'];
    $news->category_id = $_POST['category'];
    if($_FILES["file"]["error"] == 0) {
      // $path = $news->picturePath();
      unlink($news->picturePath());
      $news->setFile($_FILES['file']);
    } else {
      $news->tmp_path ="";
    }
    
    $news->save();
    
  
    // $news->updateNews();
    $_SESSION['table_message'] = "Uspesno ste izmenili vest!";
    redirect('news-table.php');
  }
?>
  <!DOCTYPE html>
  <html lang="en">
      <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1 charset=utf-8">
           <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  
          <title>Partizan Belgrade News</title>
  
      <link rel="stylesheet" href="css/style-admin.css">
      <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-bs4.min.js"></script>
  
   </head>
      
  <?php include('includes/navigation.php'); ?>


  <div class="editor-wraper col-md-6 mx-auto">
          <form method="POST" id="request" enctype="multipart/form-data">
              <div class="form-group">
                <label for="title">Naslov:</label>                             
                <input type="text" name="title" class="form-control" value="<?php echo $news->title; ?>">
              </div>
              <div class="form-group">
                <label for="category">Izaberite kategoriju:</label>
                <select class="form-control" id="category" name="category">
                
                  <?php foreach($categories as $category) : ?>
                    <option <?php if($category->id == $news->category_id){ echo 'selected';} ?> value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                  <?php endforeach; ?>

                </select>
            </div>
            <div class="form-group">
            Trenutna slika na naslovnoj:<br>
                    <img src="<?php echo $news->picturePath(); ?>" alt="" width="100%">
            </div>
            <div class="form-group">
              <label for="image">Izmeni sliku za naslovnu:</label>
              <input type="file" class="form-control-file" id="image" name="file">
            </div>
              <div class="form-group">
                <textarea id="summernote" name="body">
                <?php echo $news->body; ?>
                </textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="update" class="btn btn-secondary" value="Izmeni">
              </div>
          </form>
    </div>

<script>
$(document).ready(function() {
  $('#summernote').summernote();
});


$('#summernote').summernote({
  height: 300,                 // set editor height
  minHeight: 500,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true,                  // set focus to editable area after initializing summernote
});


</script>

</body>
</html>