<?php include_once('includes/init.php'); ?>
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
<?php

$categories = Category::findAll();


?>
<body>
  

    <div class=" col-md-6 offset-md-3 mt-4">
          <form method="POST" id="request" action="add_news.php" enctype="multipart/form-data">
              <div class="form-group">
                <label for="title">Naslov:</label>                             
                <input type="text" name="title" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="category">Izaberite kategoriju:</label>
                <select class="form-control" name="category">
                
                  <?php foreach($categories as $category) : ?>
                    <option value="<?php echo $category->id ?>"><?php echo $category->name ?></option>
                  <?php endforeach; ?>

                </select>
            </div>
            <div class="form-group">
              <label for="image">Izaberite sliku za naslovnu:</label>
              <input type="file" class="form-control-file" id="image" name="file" required>
            </div>
              <div class="form-group">
                <textarea id="summernote" name="editordata" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" class="btn btn-secondary" value="Postavi">
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