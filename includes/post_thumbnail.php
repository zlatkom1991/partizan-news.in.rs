<?php

$thumbnailPosts = News::findFromTo(0,3);

?>




<!-- Owl Carousel 1 -->

<div id="owl-carousel-1" class="owl-carousel owl-theme center-owl-nav">
<?php foreach($thumbnailPosts as $thumbPost) : ?>
			<!-- ARTICLE -->
			<article class="article thumb-article">
			<a href="post.php?id=<?php echo $thumbPost->id; ?>">
				<div class="article-img" style='height:600px'>
					<img src="<?php echo 'admin/'.  $thumbPost->picturePath(); ?>" alt="" height="600px">
				</div>
				</a>
				<div class="article-body">
					<ul class="article-info">
						<li class="article-category"><a href=""><?php echo $thumbPost->categoryName($thumbPost->id); ?></a></li>
						<li class="article-type"><i class="fa fa-camera"></i></li>
					</ul>
					<h2 class="article-title"><a href="post.php?id=<?php echo $thumbPost->id; ?>"><?php echo $thumbPost->title; ?></a></h2>
					<ul class="article-meta">
						<li><i class="fa fa-clock-o"></i> <?php echo timeFormat($thumbPost->create_time); ?></li>
                        <li><i class="fa fa-comments"></i> <?php echo News::countComments($thumbPost->id); ?></li>
					</ul>
				</div>
			</article>
			<!-- /ARTICLE -->
<?php endforeach; ?>
			

		</div>
		<!-- /Owl Carousel 1 -->