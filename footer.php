<footer>
	<div class="container">
		<?php wp_nav_menu( array( 'theme_location' => 'footer-nav', 'menu_class' => 'nav-menu' ,'container' => 'nav') ); ?>
		<div id="inline5" style="width:500px;display: none;">
			<?php /* The loop */ ?>
			<?php 
			$temp_post=$post;
			$args=array(
			  'page_id' =>124,
			  'post_type' => 'page',
			  'post_status' => 'publish',
			  'posts_per_page' => 1,
			  'caller_get_posts'=> 1
			);
			$my_query = null;
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
	  		while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<div class="employment"></div>
			<div>	
				<div class="employment-form">
				<h1 style="font-family:'happy_sans';padding-top:55px;">Get in touch</h1>
				<?php the_content();?>
				
				</div>
			</div>
			<?php endwhile;}?>
			<?php $post=$temp_post;?>
		</div>
		<div id="inline6" style="width:750px;display: none;">
			<?php /* The loop */ ?>
			<?php 
			$temp_post=$post;
			$args=array(
			  'page_id' =>403,
			  'post_type' => 'page',
			  'post_status' => 'publish',
			  'posts_per_page' => 1,
			  'caller_get_posts'=> 1
			);
			$my_query = null;
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
	  		while ($my_query->have_posts()) : $my_query->the_post(); ?>
			<div class="privacy"></div>
			<div>	
				<?php the_content();?>
			</div>
			<?php endwhile;}?>
			<?php $post=$temp_post;?>
		</div>
		<div class="left_area">
			<div class="copyright"><p><?php _e('@2013 Golden Spoon','gs');?></p></div>
			<div class="social">
				<li><a href="<?php echo ot_get_option( 'facebook_url' );?>" target="_blank" class="facebook"></a></li>
				<li><a href="<?php echo ot_get_option( 'twitter_url' );?>" target="_blank" class="twitter"></a></li>
			</div>
			<div class="logo">
				<div class="position">
					<a href="#"><img src="<?php echo THEMEROOT?>/images/footer-logo.png"></a>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer();?>
</body>
</html>