<?php 

$biggerPosts = News::findFromTo(3,4);
$smallerPosts = News::findFromTo(7,6);
$html = '';

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
							<h2 class="title">Aktuelno</h2>
			</div>
			<!-- /section title -->
						
<!-- Tab content -->
<div class="tab-content">
<!-- tab1 -->
<div>
		<!-- row -->
		<div class="row">
		<!-- Column 1 -->

        <?php foreach($biggerPosts as $biggerPost) : ?>
		
        <div class="col-md-3 col-sm-6">
		<!-- ARTICLE -->
		<article class="article">
			<div class="article-img smaller-screen">
				<a href="post.php?id=<?php echo $biggerPost->id; ?>">
					<img src="<?php echo 'admin/'.  $biggerPost->picturePath(); ?>" alt="" height='196px'>
				</a>
			        <ul class="article-info">
				        <li class="article-type"><i class="fa fa-camera"></i></li>
			        </ul>
		        </div>
		        <div class="article-body ">
			        <h4 class="article-title"><a class="cut-title" href="post.php?id=<?php echo $biggerPost->id; ?>"><?php echo $biggerPost->title; ?></a></h4>
			        <ul class="article-meta">
				        <li><i class="fa fa-clock-o"></i> <?php echo timeFormat($biggerPost->create_time); ?></li>
				        <li><i class="fa fa-comments"></i><?php echo News::countComments($thumbPost->id); ?></li>
			        </ul>
		        </div>
	        </article>
	        <!-- /ARTICLE -->
        </div>
        <!-- /Column 1 -->
         <?php endforeach; ?>
									

		</div>
		<!-- /row -->




								
	<!-- row -->
	<div class="row" id="proba">

    <?php foreach($smallerPosts as $index=>$smallerPost) : ?>
        
        <?php 
        
        if($index == 0){
            echo '<div class="col-md-4 col-sm-6">';
        } if($index == 2 || $index==4){
            echo '<div class="col-md-4 hidden-sm">';
        }
        
        
        ?>
		<!-- Column 1 -->
		<!-- <div class="col-md-4 col-sm-6"> -->
			<!-- ARTICLE -->
			<article class="article widget-article ">
				<div class="article-img">
					<a href="post.php?id=<?php echo $smallerPost->id; ?>">
						<img src="<?php echo 'admin/'. $smallerPost->picturePath(); ?>" alt="" height="80px">
					</a>
				</div>
				<div class="article-body">
					<h4 class="article-title"><a class="cut-title" href="post.php?id=<?php echo $smallerPost->id; ?>"><?php echo $smallerPost->title; ?></a></h4>
					<ul class="article-meta">
						<li><i class="fa fa-clock-o"></i><?php echo timeFormat($smallerPost->create_time); ?></li>
						<li><i class="fa fa-comments"></i><?php echo News::countComments($smallerPost->id); ?></li>
					</ul>
				</div>
			</article>
			<!-- /ARTICLE -->
            <?php if($index % 2 !=0){echo '</div>';} ?>
    <?php endforeach; ?>
				
</div>
<!-- /tab1 -->
</div>
<!-- Tab Content -->

</div>
					<!-- /Main Column -->
				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->
