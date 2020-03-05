<?php include("includes/header.php"); ?>

<?php if(!$session->isSignedIn()) { redirect("login.php"); } ?>        

<?php include("includes". DS . "navigation.php"); ?>

<?php

$ads = Ads::findAll();
?>

<div class="col-md-10 offset-md-1" style="margin-top:20px">            
                <table class="table table-fluid hover order-column stripe" id="news-table">
                <thead class='thead-dark'>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Naziv</th>
                    <!-- <th scope="col">Vest</th> -->
                    <th scope="col">Pozicija</th>
                    <th scope="col">Slika</th>
                    <th scope="col">Link</th>
                    <th scope="col">Velicina</th>
                    <th scope="col">Postavljeno</th>
                    <th scope="col">Traje do</th>
                    <th scope="col">Izmena</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($ads as $ad) : ?>
                        <tr>
                            <td><?php echo $ad->id; ?></td>
                    <td><?php echo $ad->name; ?></td>
                    <td><?php echo $ad->position; ?></td>
                    <td><img src="<?php echo $ad->picturePath(); ?>" alt="image" height="40px" ></td>
                    <td><?php echo $ad->link; ?></td>
                    <td><?php echo $ad->velicina; ?></td>
                    <td><?php echo $ad->create_time; ?></td>
                    <td><?php echo $ad->time_to; ?></td>
                    <td><a href="update_ad.php?id=<?php echo $ad->id;?>">Izmeni</a></td>
</td>

                        </tr>
                    <?php endforeach;?>
                    
                </tbody>
                </table>

</div>



  <?php include("includes". DS . "footer.php"); ?>