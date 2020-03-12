<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<?php if(!$session->isSignedIn()) { redirect("login.php"); } ?>  
<?php



if(!empty($_GET['id'])) {

  $ads = Ads::findById($_GET['id']);
  $t = strtotime($ads->time_to);
  $time = date('Y-m-d',$t);

}



  if(!empty($_POST['update'])) {

    $ads->id = $_GET['id'];
    $ads->name = $_POST['name'];
    $ads->time_to = $_POST['time_to'];
    $ads->link = $_POST['link'];

    if($_FILES["file"]["error"] == 0) {
      // $path = $ads->picturePath();
      unlink($ads->picturePath());
      $ads->setFile($_FILES['file']);
    } else {
      $ads->tmp_path ="";
    }
    
    $ads->save();
    
  
    $_SESSION['table_message'] = "Uspesno ste izmenili reklamu!";
    redirect('advertisement.php');
  }
?>



  <div class="editor-wraper col-md-6 mx-auto">
          <form method="POST" id="request" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Naziv:</label>                             
                <input type="text" name="name" class="form-control" value="<?php echo $ads->name; ?>">
              </div>
              <div class="form-group">
                <label for="link">Link:</label>                             
                <input type="text" name="link" class="form-control" value="<?php echo $ads->link; ?>">
              </div>
            <div class="form-group">
            <p>Trenutna slika:</p>
                    <img src="<?php echo $ads->picturePath(); ?>" alt="" width="300px">
            </div>
            <div class="form-group">
              <label for="image">Izmeni sliku za reklamu:</label>
              <input type="file" class="form-control-file" id="image" name="file">
            </div>
            <div class="form-group">
            <label for="time_to">Traje do:</label><br>
            <input type="date" id="time_to" name="time_to" value="<?php echo $time; ?>"> 
              </div>
              <div class="form-group">
                <input type="submit" name="update" class="btn btn-secondary" value="Izmeni">
              </div>
          </form>
    </div>
<?php include('includes/footer.php'); ?>