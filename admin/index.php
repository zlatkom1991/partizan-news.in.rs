<?php include("includes/header.php"); ?>

<?php if(!$session->isSignedIn()) { redirect("login.php"); } ?>        

<?php include("includes". DS . "navigation.php"); ?>


<?php include("includes". DS . "admin_content.php"); ?>



  <?php include("includes". DS . "footer.php"); ?>