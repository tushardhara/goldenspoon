<?php
/**
 * The default template for displaying content.
 *
 * @package Wordpress
 * @subpackage gs
 * @since gs 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" class="blog-item">				
	<div class="blog-page-title">
		<?php echo get_the_title();?>
     </div>
	<div class="blog-thumb">
		<?php echo get_the_post_thumbnail($post->ID, 'full-size'); ?>		
	</div>
	<div class="blog-artist"><?php _e('By','gs'); echo " : "; the_author();  echo " | "; the_date('m-d-Y'); ?></div>
	<div class="blog-text">					
		<?php the_content();?>
	</div>
	<div class="blog-divider"></div>
</div>