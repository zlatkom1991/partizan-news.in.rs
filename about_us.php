<?php 
$title = $og_title = "O nama";
$og_description = "Najnovije i najtačnije vesti u vezi Partizana na jednom mestu";
$og_image = "";
include('includes/header.php');

?>
<style>

.test{
    background-image: url('img/about-us-min.jpg');
    width: 100%;
    height: 300px; /* You must set a specified height */
    background-position: center; /* Center the image */
    background-repeat: no-repeat; /* Do not repeat the image */
    background-size: cover;
    margin-bottom: 10px;
}
.desni {
    margin-top: 20px;
}
</style>
<div class="test">

</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-offset-2">
            
            <h2>O nama</h2>
            <p>Portal partizan-news.in.rs online je od marta 2020. godine.<br>Portal je na usluzi svim navijačima Partizana,
             kao i svim entuzijazistima i ljubiteljima sporta, 24 časa dnevno, 365 dana u godini.<br>
              Sajt vam nudi vesti iz svih sportova, kratke informacije, analize, intervjue, 
              kao i interakciju sa portalom putem društvenih mreža.<br> Ako ste navijač Partizana i zaljubljenik 
              u sport - na pravom ste mestu!</p>
              <hr>
              <h3>Zapratite nas</h3>
              <!-- <p>Za najnovije vesti i informacije zapratite</p> -->
              <a href="instagram.com" target="_blank"><i class="fab fa-instagram"></i> pbg.news</a><br>
              <a href="https://twitter.com/partizan_news_" target="_blank"><i class="fab fa-twitter"></i> partizan_belgrade_news</a><br>
              <a href="https://www.youtube.com/channel/UCKWNedBfvF3C00g-NSDCm9Q" target="_blank"><i class="fab fa-youtube"></i> Partizan Belgrade</a>
              <hr>
              <h3>Kontaktirajte nas</h3>
              <p>Ukoliko imate pitanja za nas ili želite saradnju <br> možete nas kontaktirati putem naše<a href="contact.php"> <span style="color:blue">kontakt forme</span></a>.</p><a href=""></a>
        </div>
        <div class="col-md-6 col-offset-2 desni">
        <h3>Hvala vam na poverenju</h3><br>
        <img src="img/partizan-insta2.png" alt="" class="img-responsive fit-image">
        </div>
        
    </div>

</div>

<?php include('includes/footer.php') ?>