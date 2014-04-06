<?php
/**
 * The default template for displaying video content.
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
		<div class="vendor">
			<?php
	        $youtube_vimeo = get_post_meta( $post->ID, 'mega_youtube_vimeo_url', true ); 
	        $embed = get_post_meta( $post->ID, 'mega_video_embed_code', true ); 
	          
	        $ratio_width = get_post_meta( $post->ID, 'mega_video_ratio_width', true );
	        $ratio_height = get_post_meta( $post->ID, 'mega_video_ratio_height', true );
	                          
	        $ratio = '';
	        if ( !empty( $ratio_width ) ) 
	        $ratio = ( (int)$ratio_height / (int)$ratio_width * 100 ) .'%';
	       ?>
	      
	      <?php if ( $youtube_vimeo !='' ) { ?>
	          <?php mega_get_video( $post->ID, 960, 538 ); ?>
	      <?php } else if ( $embed !='' ) { ?>
	          <?php echo stripslashes( htmlspecialchars_decode( $embed ) );?>
	      <?php } ?>
      	</div>	
	</div>
	<div class="blog-artist"><?php _e('By','gs'); echo " : "; the_author();  echo " | "; the_date('m-d-Y'); ?></div>
	<div class="blog-text">					
		<?php the_content();?>
	</div>
	<div class="blog-divider"></div>
</div>