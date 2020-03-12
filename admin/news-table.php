
<?php include('includes/header.php'); ?>



<?php include('includes/navigation.php'); ?>

<?php 

$news = News::findAll();
?>
<div class="col-md-10 offset-md-1" style="margin-top:20px;color:red;text:align:center"><p><?php echo $_SESSION['table_message'];$_SESSION['table_message']=""; ?></p></div>
<div class="col-md-10 offset-md-1" style="margin-top:20px">            
                <table class="table table-fluid hover order-column stripe" id="news-table">
                <thead class='thead-dark'>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Naslov</th>
                    <!-- <th scope="col">Vest</th> -->
                    <th scope="col">Kategorija</th>
                    <th scope="col">Slika</th>
                    <th scope="col">Broj komentara</th>
                    <th scope="col">Postavljeno</th>
                    <th scope="col">Link</th>
                    <th scope="col">Izmene</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($news as $row) : ?>
                        <tr>
                            
                            <td><?php echo $row->id; ?></td>
                            <td><?php echo $row->title; ?></td>
                            <!-- <td><?php // echo $row->body; ?></td> -->
                            <td><?php echo $row->categoryName($row->id); ?></td>
                            <td><img src="<?php echo $row->picturePath(); ?>" alt="image" height="50px"></td>
                            <td><?php echo $row->countComments($row->id); ?></td>
                            <td><?php echo timeFormat($row->create_time); ?></td>
                            <td>
                                <div class="action_links">               
                                    <a href="../post.php?id=<?php echo $row->id; ?>" target="_blank">Pogledaj vest</a>
                                </div>
                            </td>
                            <td>
                                <div class="action_links">               
                                    <a href="delete_news.php?id=<?php echo $row->id;?>">Obriši</a>
                                    <a href="update_news.php?id=<?php echo $row->id;?>">Izmeni</a>
                                </div>
                                
                            </td>

                        </tr>
                    <?php endforeach;?>
                    
                </tbody>
                </table>

</div>
</div>


<script>
    $(document).ready( function () {
        $('#news-table').dataTable( {
  "language": {
    "paginate": {
      "next": "Sledeća",
      "previous": "Prethodna",
      "first": "Prva",
      "last": "Poslednja"
    },
    "lengthMenu": "Prikaži _MENU_ rezultata po strani",
            "zeroRecords": "Nema pronađenih rezultata!",
            "info": "Prikazujem _START_ - _END_ rezultata od ukupno _TOTAL_ rezultata",
            "infoEmpty": "Nije pronađeno ništa",
            "infoFiltered": "(filtrirani podaci od _MAX_ rezultata)",
            "loadingRecords": "Učitavam...",
            "search":         "Traži:",

  },
  "pagingType": "full_numbers",
  "order": [[ 0, "desc" ]]
} );

} );
</script>

