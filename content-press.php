<?php
/**
 * The default template for displaying content for press
 *
 * @package Wordpress
 * @subpackage gs
 * @since gs 1.0
 */
?>

	<div class="press_news">
		<div class="press_thumb">			
			<a href="<?php echo get_permalink($post->ID)?>"><?php echo get_the_post_thumbnail($post->ID, 'large'); ?></a>
		</div>
		<a href="<?php echo get_permalink($post->ID)?>"><h3><?php the_title();?></h3></a>
		<h4><?php  the_date('m-d-Y');echo " | "; _e('By','gs'); echo " : "; the_author();   ?></h4>
		<div style="height:175px;overflow:hidden;"><p><?php the_excerpt(); ?></p></div>
		<a class="read" href="<?php echo get_permalink($post->ID)?>" style="float:right;">Read More</a>
	</div>