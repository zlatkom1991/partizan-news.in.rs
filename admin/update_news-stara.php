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
    $news->setFile($_FILES['file']);
    $news->update();
    // $news->setFile($_FILES['file']);
  
    // $news->updateNews();
  
    redirect('news-table.php');
  }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
  <!-- Custom Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div id="wrapper">
<?php include("includes/top_nav.php"); ?>


<?php include("includes/side_nav.php"); ?>

    <div class="editor-wraper col-md-8 col-md-offset-2">
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
              <label for="image">Izaberite sliku za naslovnu:</label>
              <input type="file" class="form-control-file" id="image" name="file">
            </div>
              <div class="form-group">
                <textarea id="summernote" name="body">
                <?php echo $news->body; ?>
                </textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="update" class="btn btn-primary" value="Izmeni">
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