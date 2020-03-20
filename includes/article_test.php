

<?php

if(isset($_GET['title'])) {

	$title = $_GET['title'];
	$body = $_GET['body'];
}

?>

						<!-- breadcrumb -->
						<ul class="article-breadcrumb">
							<li><a href="index.php">Početna</a></li>
							<li><a href="#">Kategorija></a></li>
							<li>Naslov</li>
						</ul>
						<!-- /breadcrumb -->
					
						<!-- ARTICLE POST -->
						<article class="article article-post">
							<div class="article-share">
								<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="google"><i class="fa fa-google-plus"></i></a>
							</div>
							<div class="article-main-img">
								<img src="https://via.placeholder.com/150" alt="" height="250px" width="150px">
							</div>
							<div class="article-body">
								<ul class="article-info">
									<li class="article-category"><a href="#">Fudbal</a></li>
									<li class="article-type"><i class="fa fa-file-text"></i></li>
								</ul>
								<h1 class="article-title"><?php echo $title; ?></h1>
								<ul class="article-meta">
									<li><i class="fa fa-clock-o"></i> April 04, 2017</li>
									<li><i class="fa fa-comments"></i> 33</li>
								</ul>
                                <?php echo $body; ?>
                                
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