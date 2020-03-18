		<?php 
		
		$fudbal = News::findByCategory(1);
		$kosarka = News::findByCategory(2);
		$mostComments = News::withMostComments();
		?>
		
		<!-- SECTION -->
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-8">
						<!-- row -->
						<div class="row">
							<!-- Column 1 -->
							<div class="col-md-6 col-sm-6">
								<!-- section title -->
								<div class="section-title">
									<h2 class="title" id="Fudbal">Fudbal</h2>
								</div>
								<!-- /section title -->
								
								<?php foreach($fudbal as $index=>$post) :?>
								<?php 
									
								if($index == 0) {

									echo '
										<article class="article">
										<div class="article-img smaller-screen">
											<a href="post.php?id='. $post->id .'">
												<img src="admin'. DS . $post->picturePath().'" alt="" height="225px">
											</a>
											<ul class="article-info">
												<li class="article-type"><i class="fas fa-futbol"></i></li>
											</ul>
										</div>
										<div class="article-body">
											<h3 class="article-title cut-title"><a href="post.php?id='. $post->id .'">'. $post->title .'</a></h3>
											<ul class="article-meta">
												<li><i class="fa fa-clock-o"></i> '. timeFormat($post->create_time) .'</li>
												<li><i class="fa fa-comments"></i> '. News::countComments($post->id).'</li>
											</ul>
										</div>
									</article>
									';
								}else{

									if($index >0 && $index <3){
										echo '
												<article class="article widget-article">
												<div class="article-img">
													<a href="post.php?id='.$post->id.'">
														<img src="admin'.DS.$post->picturePath().'" alt="" height="80px">
													</a>
												</div>
												<div class="article-body">
													<h4 class="article-title cut-title"><a href="post.php?id='.$post->id.'">'.$post->title.'</a></h4>
													<ul class="article-meta">
														<li><i class="fa fa-clock-o"></i> ' . timeFormat($post->create_time) .'</li>
														<li><i class="fa fa-comments"></i> '. News::countComments($post->id).'</li>
													</ul>
												</div>
											</article>
										
										';
									}
								}
									
								?>

								<?php endforeach; ?>
								
							</div>
							<!-- /Column 1 -->
							

								<!-- Column 2 -->
								<div class="col-md-6 col-sm-6">
								<!-- section title -->
								<div class="section-title">
									<h2 class="title" id="Košarka">Košarka</h2>
								</div>
								<!-- /section title -->
								
								<?php foreach($kosarka as $index=>$post) :?>
								<?php 
									
								if($index == 0) {

									echo '
										<article class="article">
										<div class="article-img smaller-screen">
											<a href="post.php?id='. $post->id .'">
												<img src="admin'. DS . $post->picturePath().'" alt="" height="225px">
											</a>
											<ul class="article-info">
												<li class="article-type"><i class="fas fa-basketball-ball"></i></li>
											</ul>
										</div>
										<div class="article-body">
											<h3 class="article-title cut-title"><a href="post.php?id='. $post->id .'">'. $post->title .'</a></h3>
											<ul class="article-meta">
												<li><i class="fa fa-clock-o"></i> '. timeFormat($post->create_time) .'</li>
												<li><i class="fa fa-comments"></i> '. News::countComments($post->id).'</li>
											</ul>
										</div>
									</article>
									';
								}else{

									if($index >0 && $index <3){
										echo '
												<article class="article widget-article">
												<div class="article-img">
													<a href="post.php?id='.$post->id.'">
														<img src="admin'.DS.$post->picturePath().'" alt="" height="80px">
													</a>
												</div>
												<div class="article-body">
													<h4 class="article-title cut-title"><a href="post.php?id='.$post->id.'">'.$post->title.'</a></h4>
													<ul class="article-meta">
														<li><i class="fa fa-clock-o"></i> ' . timeFormat($post->create_time) .'</li>
														<li><i class="fa fa-comments"></i> '. News::countComments($post->id).'</li>
													</ul>
												</div>
											</article>
										
										';
									}
								}
									
								?>

								<?php endforeach; ?>
								
							</div>
							<!-- /Column 2 -->
						</div>
						<!-- /row -->
						
						<!-- row -->
						<div class="row">
							<!-- section title -->
							<div class="col-md-12">
								<div class="section-title">
									<h2 class="title">Sa najvise komentara</h2>
								</div>
							</div>
							<!-- /section title -->
							
							<?php foreach($mostComments as $index=>$row): ?>
	
								<div class="col-md-6 col-sm-6">
									<!-- ARTICLE -->
									<article class="article">
									<div class="article-img smaller-screen">
										<a href="post.php?id=<?php echo $row->id; ?>">
											<img src="admin/<?php echo $row->picturePath(); ?>" alt="" height="225px">
										</a>
										<ul class="article-info">
											<li class="article-type"><i class="fa fa-file-text"></i></li>
										</ul>
									</div>
									<div class="article-body">
										<h4 class="article-title cut-title"><a href="post.php?id=<?php echo $row->id; ?>"><?php echo $row->title; ?></a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> <?php echo timeFormat($row->create_time); ?></li>
											<li><i class="fa fa-comments"></i> <?php echo News::countComments($row->id); ?></li>
										</ul>
									</div>
								</article>
								<!-- /ARTICLE -->
							</div>
							<!-- /Column 1 -->
								
								<?php endforeach; ?>

						</div>			
						
					</div>
					<!-- /Main Column -->
					<?php include('post_aside_column.php'); ?>
					
				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->