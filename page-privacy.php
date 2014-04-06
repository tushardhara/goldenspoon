<?php
/**
 * Template name: Privacy Page Template 
 * The template for displaying Privacy form.
 */
get_header();?>
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