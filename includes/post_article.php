<?php require_once('admin/includes/init.php'); ?>

<?php
$url =  (isset($_SERVER['HTTPS'])? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

						<!-- breadcrumb -->
						<ul class="article-breadcrumb">
							<li><a href="index.php">Početna</a></li>
							<li><a href="#"><?php echo $news->categoryName($_GET['id']); ?></a></li>
							<li><?php echo $news->title; ?></li>
						</ul>
						<!-- /breadcrumb -->
					
						<!-- ARTICLE POST -->
						<article class="article article-post">
							<div class="article-share">
								<a href="https://www.facebook.com/sharer.php?u=<?php echo $url; ?>" class="facebook"><i class="fab fa-facebook-f"></i></a>
								<a href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>" class="twitter"><i class="fab fa-twitter"></i></a>
								<a href="whatsapp://send?text=<?php echo $url; ?>"><i class="fab fa-whatsapp"></i></a>
								<a href="viber://forward?text=<?php echo $url; ?>" class="viber"><i class="fab fa-viber"></i></a>
							</div>
							<div class="article-main-img">
								<img src="<?php echo 'admin/'. $news->picturePath(); ?>" alt="">
							</div>
							<div class="article-body">
								<ul class="article-info">
									<li class="article-category"><a href="#"><?php echo $news->categoryName($_GET['id']); ?></a></li>
									<li class="article-type"><i class="fa fa-file-text"></i></li>
								</ul>
								<h1 class="article-title"><?php echo $news->title; ?></h1>
								<ul class="article-meta">
									<li><i class="fa fa-clock-o"></i>&nbsp;<?php echo timeFormat($news->create_time); ?></li>
									<li><i class="fa fa-comments"></i> 33</li>
								</ul>
                                <?php echo $news->body; ?>
                                
							</div>
						</article>
						<!-- /ARTICLE POST -->
						
						<!-- widget tags -->
						<div class="widget-tags">
							<ul>
								<li><a href="#">News</a></li>
								<li><a href="#">Sport</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Music</a></li>
								<li><a href="#">Business</a></li>
							</ul>
						</div>
						<!-- /widget tags -->