					<?php 
					$top_side_ad = Ads::findById(2);
					$ad_middle = Ads::findById(3);
					$ad_bottom = Ads::findById(4);
					?>
					<!-- Aside Column -->
					<div class="col-md-4">
						<!-- Ad widget -->
						<div class="widget center-block">
							<a href="<?php echo $top_side_ad->link; ?>"><img class="center-block" src="admin/<?php echo $top_side_ad->picturePath(); ?>" height="250px" width="300px" ></a> 
						</div>
						<!-- /Ad widget -->
						
						<!-- social widget -->
						<div class="widget social-widget">
							<div class="widget-title">
								<h2 class="title">Stay Connected</h2>
							</div>
							<ul>
								<li><a href="#" class="facebook"><i class="fa fa-facebook"></i><br><span>Facebook</span></a></li>
								<li><a href="#" class="twitter"><i class="fa fa-twitter"></i><br><span>Twitter</span></a></li>
								<li><a href="#" class="google"><i class="fa fa-google"></i><br><span>Google+</span></a></li>
								<li><a href="#" class="instagram"><i class="fa fa-instagram"></i><br><span>Instagram</span></a></li>
								<li><a href="#" class="youtube"><i class="fa fa-youtube"></i><br><span>Youtube</span></a></li>
								<li><a href="#" class="rss"><i class="fa fa-rss"></i><br><span>RSS</span></a></li>
							</ul>
						</div>
						<!-- /social widget -->
						
						<!-- subscribe widget -->
						<div class="widget subscribe-widget">
							<div class="widget-title">
								<h2 class="title">Subscribe to Newslatter</h2>
							</div>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="input-btn">Subscribe</button>
							</form>
						</div>
						<!-- /subscribe widget -->
						
						<!-- article widget -->
						<div class="widget">
							
							<!-- Ad widget -->
						<div class="widget center-block">
						<a href="<?php echo $ad_middle->link; ?>"><img class="center-block" src="admin/<?php echo $ad_middle->picturePath();?>" alt="" width="300px"></a> 
						</div>

							<!-- Ad widget -->
							<div class="widget center-block">
							<a href="<?php echo $ad_bottom->link; ?>"><img class="center-block" src="admin/<?php echo $ad_bottom->picturePath();?>" alt="" width="300px"></a> 
						</div>
							
						</div>
						<!-- /article widget -->
						

					</div>
					<!-- /Aside Column -->