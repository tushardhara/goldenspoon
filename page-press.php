<?php
/**
 * Template name: Press Page Template 
 * The template for displaying Press pages.
 * @package Wordpress
 * @subpackage gs
 * @since gs 1.0
 */

get_header(); ?>
<div class="container page clearfix">
	<div class="press-title"></div>	
	<div class="content">
	     <?php global $wp_query; ?>
		 <?php  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
		 <?php $wp_query = new WP_Query(array('post_type'=>'press',
			'posts_per_page'=>3,
			'post_status'=>'publish','paged'=> $paged)); 
		 ?>
          <?php if ( have_posts() ) : ?>
          <?php /* Start the Loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('content-press')?>		
		  <?php endwhile;endif;?>
		  <div class="nav-area-press">
		  	<?php wpbeginner_numeric_posts_nav(); ?>
		  </div>
		  

	</div>
</div>
<?php get_footer();?>