<?php include('admin/includes/init.php'); ?>

<?php 

if(isset($_GET['id'])) {

	if(!is_numeric($_GET['id'])){
		redirect('index.php');
	} 
	
	if(!$news = News::findById($_GET['id'])){
		redirect('index.php');
	};


} 
else {

	redirect('index.php');
}

$baner_bottom = Ads::findById(5);

$title = $news->title;
$og_title = $news->title;
$og_description = "Sve vesti o Partizanu na jednom mestu";
$og_image = "";
?>
<?php include('includes/header.php'); ?>
		<!-- SECTION -->
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-8">


					<?php include('includes'. DS . 'post_article.php'); ?>	

					<?php include('includes'. DS . 'post_comments.php'); ?>



					</div>
					<!-- /Main Column -->
					

					<?php include('includes'. DS . 'post_aside_column.php') ?>

				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->
		
		<!-- AD SECTION -->
		<div class="baner-bottom">
			<img class="center-block baner-bottom" src="admin/<?php echo $baner_bottom->picturePath(); ?>" alt="">
		</div>
		<!-- /AD SECTION -->
		
		<?php
		
		$more_news = News::findByCategory($news->category_id);
		?> 
		<!-- SECTION -->
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-12">
						<!-- section title -->
						<div class="section-title">
							<h2 class="title">Jos vesti - <?php echo  $news->categoryName($_GET['id']); ?></h2>
						</div>
						<!-- /section title -->
						
						<!-- row -->
						<div class="row">
						<?php $counter = 4; ?>
						<?php foreach($more_news as $number=>$rs): ?>
							<?php 
								if($rs->id == $_GET['id']){
									$counter++;
									continue;
								} 	
							?>
							<?php if($number== $counter) break; ?>
								<!-- Column 1 -->
								<div class="col-md-3 col-sm-6">
									<!-- ARTICLE -->
									<article class="article">
										<div class="article-img">
											<a href="post.php?id=<?php echo $rs->id ?>">
												<img src="admin/<?php echo $rs->picturePath();?>" alt="" height="200px">
											</a>
											<ul class="article-info">
												<li class="article-type"><i class="fa fa-camera"></i></li>
											</ul>
										</div>
										<div class="article-body">
											<h4 class="article-title"><a href="post.php?id=<?php echo $rs->id ?>"><?php echo $rs->title; ?></a></h4>
											<ul class="article-meta">
												<li><i class="fa fa-clock-o"></i> <?php echo timeFormat($rs->create_time); ?></li>
												<li><i class="fa fa-comments"></i> <?php echo $rs->countcomments($rs->id); ?></li>
											</ul>
										</div>
									</article>
									<!-- /ARTICLE -->
								</div>
								<!-- /Column 1 -->

						<?php endforeach; ?>
							
							
							
						</div>
						<!-- /row -->
					</div>
					<!-- /Main Column -->
				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->

		<?php include('includes/footer.php'); ?>		
