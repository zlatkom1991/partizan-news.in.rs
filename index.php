<?php 
        $title = "Partizan Belgrade News";
        $og_title = $title;
		$og_description = "Najbrze i najtacnije informacije o Partizanu na jednom mestu...";
		$og_image = "";
        include('includes/header.php');
		$news = News::findById(88);
		$druga = News::findById(52);
		$numberOfComments = News::countComments(45);
		$baner_bottom = Ads::findById(5);
        $categories = Category::findAll();
		
		
		?>
		

		<?php include('includes' . DS . 'post_thumbnail.php'); ?>


	
						
		<?php include('includes/trending_post.php'); ?>




		<?php include('includes/category_posts.php'); ?>
		

		<!-- AD SECTION -->
		<div class="baner-bottom">
			<a href="<?php echo $baner_bottom->link; ?>"><img class="center-block baner-bottom" src="admin/<?php echo $baner_bottom->picturePath(); ?>" alt=""></a>
		</div>
		<!-- /AD SECTION -->
		

		<script>
		 $(document).ready(function ()
			{ $(".cut-title").each(function(i){
					var len=$(this).text().trim().length;
					if(len>90)
					{
						$(this).text($(this).text().substr(0,80)+'...');
					}
				});
			});
		</script>

		
<?php include('includes/footer.php') ?>
