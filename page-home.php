<?php
/**
 * Template name: Home Page Template 
 * The template for displaying about pages.
 */

get_header(); ?>
<div class="container clearfix">
	<div class="left">
		<div class="list">
			<?php 
				$temp_post = $post;
				$wp_query = new WP_Query(); $wp_query->query('post_type=press&showposts=10');$i=0;
				while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
				<div class="item">
					<div class="divider"></div>
					<div class="thumb">
					    <?php echo get_the_post_thumbnail($post->ID, 'small-list-container'); ?>
					</div>
					<div class="text">
						<a href="<?php echo get_permalink( $post->ID )?>" class="nounder color"><h4><?php echo get_the_title();?></h4></a>
						<p><?php echo substr(get_the_excerpt(), 0,30); ?></p>
						<div class="date"><?php echo get_the_date('M-d');?></div>
					</div>
				</div>
				<?php if($i==$wp_query->post_count-1) {?>
					<div class="divider"></div>
					<?php } ?>
			<?php $i++;endwhile;?>
			<?php $post =$temp_post;?>
		</div>
		<div class="follow_twitter">
			<a href="<?php echo ot_get_option( 'twitter_url' );?>" target="_blank"><img src="<?php echo ot_get_option( 'twitter_image' );?>"></a>
		</div>
		<div class="gc">
			<a class="fancybox" href="#inline1" style="text-decoration:none;">
			<div class="thumb"><img src="<?php echo ot_get_option( 'gc_image' );?>"></div>
			<div class="text"><img src="<?php echo ot_get_option( 'gc_image_text' );?>"></div>
			</a>
		</div>
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
	</div>
	<div class="right">		

		<?php get_template_part('slider');?>
		<div class="four">
			<div class="item">
				<a href="<?php echo site_url(ot_get_option('home_first_text_url'));?>" class="nounder"><h4><?php echo ot_get_option( 'home_first_heading' );?></h4></a>
				<p><?php echo ot_get_option( 'home_first_text' );?></p>
				<img src="<?php echo ot_get_option( 'home_first_image' );?>">
			</div>
			<div class="item">
				<a href="<?php echo site_url(ot_get_option('home_sec_text_url'));?>" class="nounder"><h4><?php echo ot_get_option( 'home_sec_heading' );?></h4></a>
				<p><?php echo ot_get_option( 'home_sec_text' );?></p></p>
				<img src="<?php echo ot_get_option( 'home_sec_image' );?>">
			</div>
			<div class="item">
				<a href="<?php echo site_url(ot_get_option('home_third_text_url'));?>" class="nounder"><h4><?php echo ot_get_option( 'home_third_heading' );?></h4></a>
				<p><?php echo ot_get_option( 'home_third_text' );?></p></p>
				<img src="<?php echo ot_get_option( 'home_third_image' );?>">
			</div>
			<div class="item">
				<a href="<?php echo site_url(ot_get_option('home_fourth_text_url'));?>" class="nounder"><h4><?php echo ot_get_option( 'home_fourth_heading' );?></h4></a>
				<p><?php echo ot_get_option( 'home_fourth_text' );?></p></p>
				<img src="<?php echo ot_get_option( 'home_fourth_image' );?>">
			</div>
		</div>

		<div class="flow">
					<h3>Let us know</h3>
		<a href="<?php echo site_url(ot_get_option('flow_url'));?>">	<img src="<?php echo ot_get_option( 'flow_image' );?>"></a>
		</div>
	</div>
</div>
<?php get_footer();?>