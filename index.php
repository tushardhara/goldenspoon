<?php
/**
 * The main template file.
 */
get_header();
?>
<div class="container page clearfix">
	<div class="blog-title"></div>
	<div class="blog-left">
		<div class="blog-list">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile;endif; ?>
		</div>		
	</div>	
</div>
<?php get_footer();?>