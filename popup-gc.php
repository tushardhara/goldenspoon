		<div id="inline1" style="width:680px;display: none;">
			<div style="margin-top:0px; width:650px;height:260px">
				<div class="gctitle"></div>
				<div style="width:350px;float:left; margin-top:53px;">
				<?php 
					$temp_post = $post;
						$wp_query = new WP_Query(); $wp_query->query('pagename=golden-customer');
						while ($wp_query->have_posts()) : $wp_query->the_post();
							the_content();
						endwhile;
					$post = $temp_post;
					?>
				</div>
				<div style="width:300px;float:left;margin-top:10px;">
					<div class="slidewrap3" data-autorotate="2000">						
						<ul class="slider">
						<?php 
							$temp_post = $post;
							$wp_query = new WP_Query(); $wp_query->query('post_type=gcustomer');
							while ($wp_query->have_posts()) : $wp_query->the_post();
							?>
							<li class="slide">	
								<div class="gc">
									<div class="thumb"><?php echo get_the_post_thumbnail($post->ID,'large')?></div>
									<div class="text"><?php the_title()?></br><?php the_content()?></div>
								</div>
							</li>
							<?php
							endwhile;
							$post = $temp_post;
						?>	
						</ul>
						<ul class="slidecontrols" role="navigation">	
							<li role="presentation"><a href="#carousel-3-0" class="car-next"></a></li>	
							<li role="presentation"><a href="#carousel-3-0" class="car-prev"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>